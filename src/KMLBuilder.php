<?php

namespace KML;

use KML\Features\AltitudeMode;
use KML\Features\Containers\Container;
use KML\Features\Containers\Document;
use KML\Features\Containers\Folder;
use KML\Features\NetworkLink;
use KML\Features\Overlays\GroundOverlay;
use KML\Features\Overlays\LatLonBox;
use KML\Features\Overlays\Overlay;
use KML\Features\Overlays\ScreenOverlay;
use KML\Features\Placemark;
use KML\FieldTypes\Atom\Author;
use KML\FieldTypes\ColorMode;
use KML\FieldTypes\Coordinates;
use KML\FieldTypes\ItemIconState;
use KML\FieldTypes\ListItemType;
use KML\FieldTypes\RefreshMode;
use KML\FieldTypes\Vec2Type;
use KML\Geometries\Geometry;
use KML\Geometries\Line;
use KML\Geometries\LinearRing;
use KML\Geometries\LineString;
use KML\Geometries\MultiGeometry;
use KML\Geometries\Point;
use KML\Geometries\Polygon;
use KML\StyleSelectors\Pair;
use KML\StyleSelectors\Style;
use KML\StyleSelectors\StyleMap;
use KML\StyleSelectors\StyleSelector;
use KML\SubStyles\BalloonStyle;
use KML\SubStyles\ColorStyles\ColorStyle;
use KML\SubStyles\ColorStyles\IconStyle;
use KML\SubStyles\ColorStyles\LabelStyle;
use KML\SubStyles\ColorStyles\LineStyle;
use KML\SubStyles\ColorStyles\PolyStyle;
use KML\SubStyles\ItemIcon;
use KML\SubStyles\ListStyle;
use KML\SubStyles\SubStyle;
use KML\Time\TimeSpan;
use KML\Time\TimeStamp;
use KML\Views\Camera;
use KML\Views\LookAt;

class KMLBuilder
{
    public static function buildKML(\SimpleXMLElement $kmlXMLObject): KML
    {
        $builder = new KMLBuilder();
        $kml = new KML();

        $featureXMLObject = $kmlXMLObject->children();

        foreach ($featureXMLObject as $elementType => $value) {
            switch ($elementType) {
                case 'Document':
                    $builder->buildDocument($elementType, $value);
                    break;
                case 'Placemark':
                    $builder->buildPlacemark($elementType, $value);
                    break;
                case 'Folder':
                    $builder->buildFolder($elementType, $value);
                    break;
                case 'NetworkLink':
                    $builder->buildNetworkLink($elementType, $value);
                    break;
            }
        }

        return $kml;
    }

    private function processKMLObject(AbstractView $abstractView, \SimpleXMLElement $objectXMLObject)
    {
        $attributes = $objectXMLObject->attributes();

        foreach ($attributes as $key => $value) {
            if ($key == 'id') {
                $abstractView->setId((string)$value);
            }
        }
    }

    private function processAbstractView(AbstractView $abstractView, \SimpleXMLElement $abstractViewXMLObject)
    {
        $this->processKMLObject($abstractView, $abstractViewXMLObject);
    }

    private function processFeature(Feature $feature, \SimpleXMLElement $featureXMLObject)
    {
        $this->processKMLObject($feature, $featureXMLObject);

        $featureContent = $featureXMLObject->children();

        $simpleProperties = [
            'name',
            'visibility',
            'open',
            'address',
            'phoneNumber',
            'Snippet',
            'description',
            'styleUrl'
        ];

        foreach ($featureContent as $key => $value) {
            switch (true) {
                case in_array($key, $simpleProperties):
                    $feature->set($key, $value->__toString());
                    break;
                case $key == 'Region':
                    $feature->set($key, $this->buildRegion($key, $value));
                    break;
                case 'Camera':
                    $feature->setAbstractView($this->buildCamera($key, $value));
                case 'LookAt':
                    $feature->setAbstractView($this->buildLookAt($key, $value));
                    break;
                case 'TimeStamp':
                    $feature->setTimePrimitive($this->buildTimeStamp($key, $value));
                case 'TimeSpan':
                    $feature->setTimePrimitive($this->buildTimeSpan($key, $value));
                    break;
                case 'Style':
                    $feature->addStyleSelector($this->buildStyle($key, $value));
                case 'StyleMap':
                    $feature->addStyleSelector($this->buildStyleMap($key, $value));
                    break;
                case 'atom:author':
                    $feature->setAuthor($this->buildAuthor($key, $value));
                    break;
            }
        }
    }

    private function buildNetworkLink(\SimpleXMLElement $networkLinkXMLObject): KMLObject
    {
        $networkLink = new NetworkLink();
        $this->processFeature($networkLink, $networkLinkXMLObject);

        return $networkLink;
    }

    private function processContainer(Container $container, \SimpleXMLElement $containerXMLObject)
    {
        $this->processFeature($container, $containerXMLObject);

        $containerContent = $containerXMLObject->children();

        foreach ($containerContent as $key => $value) {
            switch ($key) {
                case 'NetworkLink':
                    $container->addFeature($this->buildNetworkLink($key, $value));
                    break;
                case 'Placemark':
                    $container->addFeature($this->buildPlacemark($key, $value));
                    break;
                case 'PhotoOverlay':
                    $container->addFeature($this->buildPhotoOverlay($key, $value));
                    break;
                case 'ScreenOverlay':
                    $container->addFeature($this->buildScreenOverlay($key, $value));
                    break;
                case 'GroundOverlay':
                    $container->addFeature($this->buildGroundOverlay($key, $value));
                    break;
                case 'Folder':
                    $container->addFeature($this->buildFolder($key, $value));
                    break;
                case 'Document':
                    $container->addFeature($this->buildDocument($key, $value));
                    break;
            }
        }
    }

    private function buildDocument(\SimpleXMLElement $documentXMLObject): KMLObject
    {
        $document = new Document();
        $this->processContainer($document, $documentXMLObject);

        return $document;
    }

    private function buildFolder(\SimpleXMLElement $folderXMLObject): KMLObject
    {
        $folder = new Folder();

        $this->processContainer($folder, $folderXMLObject);

        return $folder;
    }

    private function buildLatLonBox(\SimpleXMLElement $latLonBoxXMLObject): KMLObject
    {
        $latLonBox = new LatLonBox();
        $this->processKMLObject($latLonBox, $latLonBoxXMLObject);

        $latLonBoxContent = $latLonBoxXMLObject->children();

        foreach ($latLonBoxContent as $key => $value) {
            switch ($key) {
                case 'north':
                    $latLonBox->setNorth($value->__toString());
                    break;
                case 'east':
                    $latLonBox->setEast($value->__toString());
                    break;
                case 'west':
                    $latLonBox->setWest($value->__toString());
                    break;
                case 'south':
                    $latLonBox->setSouth($value->__toString());
                    break;
                case 'rotation':
                    $latLonBox->setRotation($value->__toString());
                    break;
            }
        }

        return $latLonBox;
    }

    private function processOverlay(Overlay $overlay, \SimpleXMLElement $overlayXMLObject)
    {
        $this->processFeature($overlay, $overlayXMLObject);

        $overlayContent = $overlayXMLObject->children();

        foreach ($overlayContent as $key => $value) {
            switch ($key) {
                case 'color':
                    $overlay->setColor($value->__toString());
                    break;
                case 'drawOrder':
                    $overlay->setDrawOrder($value->__toString());
                    break;
                case 'Icon':
                    $overlay->setIcon($this->buildIcon($value));
                    break;
            }
        }
    }

    private function buildGroundOverlay(\SimpleXMLElement $groundOverlayXMLObject): KMLObject
    {
        $groundOverlay = new GroundOverlay();
        $this->processOverlay($groundOverlay, $groundOverlayXMLObject);

        $groundOverlayContent = $groundOverlayXMLObject->children();

        foreach ($groundOverlayContent as $key => $value) {
            switch ($key) {
                case 'altitude':
                    $groundOverlay->setAltitude($value->__toString());
                    break;
                case 'altitudeMode':
                    $groundOverlay->setAltitudeMode($this->buildAltitudeMode($value));
                    break;
                case 'LatLonBox':
                    $groundOverlay->setLatLonBox($this->buildLatLonBox($value));
                    break;
            }
        }

        return $groundOverlay;
    }

    private function buildScreenOverlay(\SimpleXMLElement $screenOverlayXMLObject): KMLObject
    {
        $screenOverlay = new ScreenOverlay();

        $this->processOverlay($screenOverlay, $screenOverlayXMLObject);

        $screenOverlayContent = $screenOverlayXMLObject->children();

        foreach ($screenOverlayContent as $key => $value) {
            switch ($key) {
                case 'rotation':
                    $screenOverlay->setRotation((string)$value);
                    break;
                case 'overlayXY':
                    $screenOverlay->setOverlayXY($this->buildVec2Type($value));
                    break;
                case 'screenXY':
                    $screenOverlay->setScreenXY($this->buildVec2Type($value));
                    break;
                case 'rotationXY':
                    $screenOverlay->setRotationXY($this->buildVec2Type($value));
                    break;
                case 'size':
                    $screenOverlay->setSize($this->buildVec2Type($value));
                    break;
            }
        }

        return $screenOverlay;
    }

    private function buildCamera(\SimpleXMLElement $cameraXMLObject): KMLObject
    {
        $camera = new Camera();
        $this->processAbstractView($camera, $cameraXMLObject);

        return $camera;
    }

    private function buildLookAt(\SimpleXMLElement $lookAtXMLObject): KMLObject
    {
        $lookAt = new LookAt();
        $this->processAbstractView($lookAt, $lookAtXMLObject);

        $lookAtContent = $lookAtXMLObject->children();

        foreach ($lookAtContent as $key => $value) {
            switch ($key) {
                case 'longitude':
                    $lookAt->setLongitude($value->__toString());
                    break;
                case 'latitude':
                    $lookAt->setLatitude($value->__toString());
                    break;
                case 'altitude':
                    $lookAt->setAltitude($value->__toString());
                    break;
                case 'heading':
                    $lookAt->setHeading($value->__toString());
                    break;
                case 'tilt':
                    $lookAt->setTilt($value->__toString());
                    break;
                case 'range':
                    $lookAt->setRange($value->__toString());
                    break;
                case 'altitudeMode':
                    $lookAt->setAltitudeMode($this->buildAltitudeMode($value));
                    break;
            }
        }

        return $lookAt;
    }

    private function buildPlacemark(\SimpleXMLElement $placemarkXMLObject): KMLObject
    {
        $placemark = new Placemark();

        $this->processFeature($placemark, $placemarkXMLObject);
        $placemarkContent = $placemarkXMLObject->children();

        $geometryProperties = ['Point', 'LineString', 'LinearRing', 'Polygon', 'MultiGeometry', 'Model'];

        foreach ($placemarkContent as $key => $value) {
            if (in_array($key, $geometryProperties)) {
                $placemark->setGeometry($this->build($key, $value));
            }
        }

        return $placemark;
    }

    private function buildMultiGeometry(\SimpleXMLElement $multiGeometryXMLObject): KMLObject
    {
        $multiGeometry = new MultiGeometry();
        $this->processGeometry($multiGeometry, $multiGeometryXMLObject);

        $geometriesObjects = ['Point', 'LineString', 'LinearRing', 'Polygon', 'MultiGeometry', 'Model'];

        foreach ($multiGeometryXMLObject as $key => $value) {
            if (in_array($key, $geometriesObjects)) {
                $multiGeometry->addGeometry($this->build($key, $value));
            }
        }

        return $multiGeometry;
    }


    private function build(string $elementType, \SimpleXMLElement $value): KMLObject
    {
        switch ($elementType) {
            case 'Point':
                return $this->buildPoint($value);
                break;
            case 'LineString':
                return $this->buildLineString($value);
                break;
            case 'LinearRing':
                return $this->buildLinearRing($value);
                break;
            case 'Polygon':
                return $this->buildPolygon($value);
                break;
            case 'MultiGeometry':
                return $this->buildMultiGeometry($value);
                break;
            case 'Model':
                return $this->buildModel($value);
                break;
        }
    }

    private function processGeometry(Geometry $geometry, \SimpleXMLElement $geometryXMLObject)
    {
        $this->processKMLObject($geometry, $geometryXMLObject);
    }

    private function buildPoint(\SimpleXMLElement $pointXMLObject): KMLObject
    {
        $point = new Point();

        $this->processGeometry($point, $pointXMLObject);
        $pointContent = $pointXMLObject->children();

        foreach ($pointContent as $key => $value) {
            switch ($key) {
                case 'extrude':
                    $point->setExtrude($value);
                    break;
                case 'altitudeMode':
                    $point->setAltitudeMode($this->buildAltitudeMode($value));
                    break;
                case 'coordinates':
                    $point->setCoordinates($this->buildCoordinates($value));
                    break;
            }
        }

        return $point;
    }

    private function processLine(Line $line, \SimpleXMLElement $content)
    {
        $this->processGeometrySimple($line, $content);
        foreach ($content as $key => $value) {
            switch ($key) {
                case 'coordinates':
                    $coordinates = explode(" ", trim($value->__toString()));
                    foreach ($coordinates as $coordinate) {
                        if (strlen($coordinate)) {
                            $line->addCoordinate($this->buildCoordinates($coordinate));
                        }
                    }
                    break;
            }
        }
    }

    private function processGeometrySimple(GeometrySimple $simple, \SimpleXMLElement $content)
    {
        foreach ($content as $key => $value) {
            switch ($key) {
                case 'extrude':
                    $simple->setExtrude($value->__toString());
                    break;
                case 'tessellate':
                    $simple->setTessellate($value->__toString());
                    break;
                case 'altitudeMode':
                    $simple->setAltitudeMode($this->buildAltitudeMode($value));
                    break;
            }
        }
    }

    private function buildLineString(\SimpleXMLElement $lineStringXMLObject): KMLObject
    {
        $lineString = new LineString();
        $this->processGeometry($lineString, $lineStringXMLObject);

        $lineStringContent = $lineStringXMLObject->children();

        return $this->processLine($lineString, $lineStringContent);
    }

    private function buildLinearRing(\SimpleXMLElement $linearRingXMLObject): KMLObject
    {
        $linearRing = new LinearRing();
        $this->processGeometry($linearRing, $linearRingXMLObject);

        $linearRingContent = $linearRingXMLObject->children();

        return $this->processLine($linearRing, $linearRingContent);
    }

    private function buildPolygon(\SimpleXMLElement $polygonXMLObject): KMLObject
    {
        $polygon = new Polygon();
        $this->processGeometry($polygon, $polygonXMLObject);

        $polygonContent = $polygonXMLObject->children();

        $this->processGeometrySimple($polygon, $polygonContent);
        foreach ($polygonContent as $key => $value) {
            switch ($key) {
                case 'outerBoundaryIs':
                    $polygon->setOuterBoundaryIs(
                        $this->buildLinearRing($value->children())
                    );
                    break;
                case 'innetBoundaryIs':
                    $polygon->setInnerBoundaryIs(
                        $this->buildLinearRing($value->children())
                    );
                    break;
            }
        }

        return $polygon;
    }

    private function buildAltitudeMode(\SimpleXMLElement $altitudeModeXMLObject): KMLObject
    {
        $altitudeMode = new AltitudeMode();
        $altitudeMode->setModeFromString($altitudeModeXMLObject->__toString());

        return $altitudeMode;
    }

    private function buildRefreshMode(\SimpleXMLElement $refreshModeXMLObject): KMLObject
    {
        $refreshMode = new RefreshMode();
        $refreshMode->setModeFromString($refreshModeXMLObject->__toString());

        return $refreshMode;
    }

    private function buildCoordinates(\SimpleXMLElement $coordinatesXMLObject): KMLObject
    {
        $coordinates = new Coordinates();

        $coordinatesString = $coordinatesXMLObject;
        if (is_object($coordinatesXMLObject)) {
            $coordinatesString = $coordinatesXMLObject->__toString();
        }

        $coordinates_array = explode(",", $coordinatesString);

        if (isset($coordinates_array[0])) {
            $coordinates->setLongitude($coordinates_array[0]);
        }

        if (isset($coordinates_array[1])) {
            $coordinates->setLatitude($coordinates_array[1]);
        }

        if (isset($coordinates_array[2])) {
            $coordinates->setAltitude($coordinates_array[2]);
        }

        return $coordinates;
    }

    private function processStyleSelector(StyleSelector $styleSelector, \SimpleXMLElement $styleSelectorXMLObject)
    {
        $this->processKMLObject($styleSelector, $styleSelectorXMLObject);
    }

    private function buildStyle(\SimpleXMLElement $styleXMLObject): KMLObject
    {
        $style = new Style();
        $this->processStyleSelector($style, $styleXMLObject);

        $styleContent = $styleXMLObject->children();

        foreach ($styleContent as $key => $value) {
            switch ($key) {
                case 'BalloonStyle';
                    $style->setBalloonStyle($this->buildBalloonStyle($key, $value));
                    break;
                case 'IconStyle';
                    $style->setIconStyle($this->buildIconStyle($key, $value));
                    break;
                case 'LabelStyle';
                    $style->setLabelStyle($this->buildLabelStyle($key, $value));
                    break;
                case 'LineStyle';
                    $style->setLineStyle($this->buildLineStyle($key, $value));
                    break;
                case 'ListStyle';
                    $style->setListStyle($this->buildListStyle($key, $value));
                    break;
                case 'PolyStyle';
                    $style->setPolyStyle($this->buildPolyStyle($key, $value));
                    break;
            }
        }

        return $style;
    }

    private function buildPair(\SimpleXMLElement $pairXMLObject): KMLObject
    {
        $pair = new Pair();
        $this->processKMLObject($pair, $pairXMLObject);

        $pairContent = $pairXMLObject->children();

        foreach ($pairContent as $key => $value) {
            switch ($key) {
                case 'key':
                    $pair->setKey($value->__toString());
                    break;
                case 'styleUrl':
                    $pair->setStyleUrl($value->__toString());
                    break;
            }
        }

        return $pair;
    }

    private function buildStyleMap(\SimpleXMLElement $styleMapXMLObject): KMLObject
    {
        $styleMap = new StyleMap();
        $this->processStyleSelector($styleMap, $styleMapXMLObject);

        $styleMapContent = $styleMapXMLObject->children();
        foreach ($styleMapContent as $key => $value) {
            if ($key == 'Pair') {
                $styleMap->addPair($this->buildPair($value));
            }
        }

        return $styleMap;
    }

    private function processSubStyle(SubStyle $subStyle, \SimpleXMLElement $subStyleXMLObject)
    {
        $this->processKMLObject($subStyle, $subStyleXMLObject);
    }

    private function buildListItemType(\SimpleXMLElement $listItemTypeXMLObject): KMLObject
    {
        $listItemType = new ListItemType();
        $listItemType->setModeFromString($listItemTypeXMLObject);

        return $listItemType;
    }

    private function buildItemIcon(\SimpleXMLElement $itemIconXMLObject): KMLObject
    {
        $itemIcon = new ItemIcon();

        foreach ($itemIconXMLObject as $key => $value) {
            switch ($key) {
                case 'state':
                    $itemIcon->setState(new ItemIconState((string)$value));
                    break;
                case 'href':
                    $itemIcon->setHref((string)$value);
                    break;
            }
        }

        return $itemIcon;
    }

    private function buildListStyle(\SimpleXMLElement $listStyleXMLObject): KMLObject
    {
        $listStyle = new ListStyle();
        $this->processSubStyle($listStyle, $listStyleXMLObject);

        $listStyleContent = $listStyleXMLObject->children();
        foreach ($listStyleContent as $key => $value) {
            switch ($key) {
                case 'listItemType':
                    $listStyle->setListItemType($this->buildListItemType($value));
                    break;
                case 'bgColor':
                    $listStyle->setBgColor($value->__toString());
                    break;
                case 'ItemIcon':
                    $listStyle->addItemIcon($this->buildItemIcon($value));
                    break;
                case 'maxSnippetLines':
                    $listStyle->setMaxSnippetLines((string)$value);
                    break;
            }
        }

        return $listStyle;
    }

    private function buildBalloonStyle(\SimpleXMLElement $balloonStyleXMLObject): KMLObject
    {
        $balloonStyle = new BalloonStyle();
        $this->processSubStyle($balloonStyle, $balloonStyleXMLObject);

        $balloonStyleContent = $balloonStyleXMLObject->children();
        foreach ($balloonStyleContent as $key => $value) {
            switch ($key) {
                case 'bgColor':
                    $balloonStyle->setBgColor($value->__toString());
                    break;
                case 'textColor':
                    $balloonStyle->setTextColor($value->__toString());
                    break;
                case 'text':
                    $balloonStyle->setText($value->__toString());
                    break;
            }
        }

        return $balloonStyle;
    }

    private function buildColorMode(\SimpleXMLElement $colorModeXMLObject): KMLObject
    {
        $colorMode = new ColorMode();
        $colorMode->setModeFromString($colorModeXMLObject);

        return $colorMode;
    }

    private function processColorStyle(ColorStyle $colorStyle, \SimpleXMLElement $colorStyleXMLObject)
    {
        $this->processSubStyle($colorStyle, $colorStyleXMLObject);

        $colorStyleContent = $colorStyleXMLObject->children();

        foreach ($colorStyleContent as $key => $value) {
            switch ($key) {
                case 'color':
                    $colorStyle->setColor($value->__toString());
                    break;
                case 'colorMode':
                    $colorStyle->setColorMode($this->buildColorMode($value));
                    break;
            }
        }
    }

    private function buildLineStyle(\SimpleXMLElement $lineStyleXMLObject): KMLObject
    {
        $lineStyle = new LineStyle();
        $this->processColorStyle($lineStyle, $lineStyleXMLObject);

        $lineStyleContent = $lineStyleXMLObject->children();

        foreach ($lineStyleContent as $key => $value) {
            if ($key == 'width') {
                $lineStyle->setWidth((string)$value);
            }
        }

        return $lineStyle;
    }

    private function buildVec2Type(\SimpleXMLElement $vec2TypeXMLObject): KMLObject
    {
        $vec2Type = new Vec2Type();

        $attributes = $vec2TypeXMLObject->attributes();

        foreach ($attributes as $key => $value) {
            switch ($key) {
                case 'x':
                    $vec2Type->setX($value->__toString());
                    break;
                case 'y':
                    $vec2Type->setY($value->__toString());
                    break;
                case 'xunits':
                    $vec2Type->setXUnits($value->__toString());
                    break;
                case 'yunits':
                    $vec2Type->setYUnits($value->__toString());
                    break;
            }
        }

        return $vec2Type;
    }

    private function buildIconStyle(\SimpleXMLElement $iconStyleXMLObject): KMLObject
    {
        $iconStyle = new IconStyle();
        $this->processColorStyle($iconStyle, $iconStyleXMLObject);

        $iconStyleContent = $iconStyleXMLObject->children();
        foreach ($iconStyleContent as $key => $value) {
            switch ($key) {
                case 'scale':
                    $iconStyle->setScale($value->__toString());
                    break;
                case 'heading':
                    $iconStyle->setHeading($value->__toString());
                    break;
                case 'Icon':
                    $iconStyle->setIcon($this->buildIcon($value));
                    break;
                case 'hotSpot':
                    $iconStyle->setHotSpot($this->buildVec2Type($value));
                    break;
            }
        }

        return $iconStyle;
    }

    private function buildLabelStyle(\SimpleXMLElement $labelStyleXMLObject): KMLObject
    {
        $labelStyle = new LabelStyle();
        $this->processColorStyle($labelStyle, $labelStyleXMLObject);

        $labelStyleContent = $labelStyleXMLObject->children();

        foreach ($labelStyleContent as $key => $value) {
            if ($key == 'scale') {
                $labelStyle->setScale((string)$value);
            }
        }

        return $labelStyle;
    }

    private function buildPolyStyle(\SimpleXMLElement $polyStyleXMLObject): KMLObject
    {
        $polyStyle = new PolyStyle();
        $this->processColorStyle($polyStyle, $polyStyleXMLObject);

        $polyStyleContent = $polyStyleXMLObject->children();

        foreach ($polyStyleContent as $key => $value) {
            switch ($key) {
                case 'fill':
                    $polyStyle->setFill((string)$value);
                    break;
                case 'outline':
                    $polyStyle->setOutline((string)$value);
                    break;
            }
        }

        return $polyStyle;
    }

    private function buildRegion(\SimpleXMLElement $regionXMLObject): KMLObject
    {
        $region = new Region();
        $this->processKMLObject($region, $regionXMLObject);

        $regionContent = $regionXMLObject->children();

        foreach ($regionContent as $key => $value) {
            if ($key == 'LatLonAltBox') {
                throw new \Exception('TODO');
                //$region->setLatLonAltBox(buildLatLonAltBox($value));
            } elseif ($key == 'Lod') {
                throw new \Exception('TODO');
                //$region->setLod(buildLod($value));
            }
        }

        return $region;
    }

    private function buildIcon(\SimpleXMLElement $iconXMLObject): KMLObject
    {
        $icon = new Icon();
        $this->processKMLObject($icon, $iconXMLObject);

        $iconContent = $iconXMLObject->children();

        foreach ($iconContent as $key => $value) {
            switch ($key) {
                case 'href':
                    $icon->setHref($value->__toString());
                    break;
                case 'refreshInterval':
                    $icon->setRefreshInterval($value->__toString());
                    break;
                case 'viewRefreshTime':
                    $icon->setViewRefreshTime($value->__toString());
                    break;
                case 'viewBoundScale':
                    $icon->setViewBoundScale($value->__toString());
                    break;
                case 'viewFormat':
                    $icon->setViewFormat($value->__toString());
                    break;
                case 'httpQuery':
                    $icon->setHttpQuery($value->__toString());
                    break;
                case 'refreshMode':
                    $icon->set($this->buildRefreshMode($value));
                    break;
                case 'viewRefreshMode':
                    $icon->setViewRefreshMode($value->__toString());
                    break;
            }
        }

        return $icon;
    }

    private function buildAuthor(\SimpleXMLElement $authorXMLObject): KMLObject
    {
        $author = new Author();

        $author->setName($authorXMLObject->name);
        $author->setUri($authorXMLObject->uri);
        $author->setEmail($authorXMLObject->email);

        return $author;
    }

    private function buildTimeStamp(\SimpleXMLElement $kmlXMLObject): KMLObject
    {
        $kml = new TimeStamp();
        $kml->setWhen($kmlXMLObject->when);

        return $kml;
    }

    private function buildTimeSpan(\SimpleXMLElement $kmlXMLObject): KMLObject
    {
        $kml = new TimeSpan();
        $kml->setBegin($kmlXMLObject->begin);
        $kml->setEnd($kmlXMLObject->end);

        return $kml;
    }
}
