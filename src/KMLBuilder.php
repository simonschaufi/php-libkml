<?php

namespace KML;

use KML\Features\AltitudeMode;
use KML\Features\Containers\Container;
use KML\Features\Containers\Document;
use KML\Features\Containers\Folder;
use KML\Features\Feature;
use KML\Features\NetworkLink;
use KML\Features\Overlays\GroundOverlay;
use KML\Features\Overlays\LatLonBox;
use KML\Features\Overlays\Overlay;
use KML\Features\Overlays\PhotoOverlay;
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
use KML\Geometries\GeometrySimple;
use KML\Geometries\Line;
use KML\Geometries\LinearRing;
use KML\Geometries\LineString;
use KML\Geometries\Model;
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
                    $kml->setFeature($builder->buildDocument($value));
                    break;
                case 'Placemark':
                    $kml->setFeature($builder->buildPlacemark($value));
                    break;
                case 'Folder':
                    $kml->setFeature($builder->buildFolder($value));
                    break;
                case 'NetworkLink':
                    $kml->setFeature($builder->buildNetworkLink($value));
                    break;
            }
        }

        return $kml;
    }

    private function processKMLObject(KMLObject $KMLObject, \SimpleXMLElement $objectXMLObject)
    {
        $attributes = $objectXMLObject->attributes();

        foreach ($attributes as $key => $value) {
            if ($key == 'id') {
                $KMLObject->setId((string)$value);
            }
        }
    }

    private function processFeature(Feature $feature, \SimpleXMLElement $featureXMLObject)
    {
        $this->processKMLObject($feature, $featureXMLObject);

        $featureContent = $featureXMLObject->children();

        foreach ($featureContent as $key => $value) {
            switch ($key) {
                case 'name':
                case 'visibility':
                case 'open':
                case 'address':
                case 'phoneNumber':
                case 'Snippet':
                case 'description':
                case 'styleUrl':
                    $feature->set($key, (string)$value);
                    break;
                case 'Region':
                    $feature->set($key, $this->buildRegion($value));
                    break;
                case 'Camera':
                    $feature->setAbstractView($this->buildCamera($value));
                    break;
                case 'LookAt':
                    $feature->setAbstractView($this->buildLookAt($value));
                    break;
                case 'TimeStamp':
                    $feature->setTimePrimitive($this->buildTimeStamp($value));
                    break;
                case 'TimeSpan':
                    $feature->setTimePrimitive($this->buildTimeSpan($value));
                    break;
                case 'Style':
                    $feature->addStyleSelector($this->buildStyle($value));
                    break;
                case 'StyleMap':
                    $feature->addStyleSelector($this->buildStyleMap($value));
                    break;
                case 'atom:author':
                    $feature->setAuthor($this->buildAuthor($value));
                    break;
            }
        }
    }

    private function buildNetworkLink(\SimpleXMLElement $networkLinkXMLObject): NetworkLink
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
                    $container->addFeature($this->buildNetworkLink($value));
                    break;
                case 'Placemark':
                    $container->addFeature($this->buildPlacemark($value));
                    break;
                case 'PhotoOverlay':
                    $container->addFeature($this->buildPhotoOverlay($value));
                    break;
                case 'ScreenOverlay':
                    $container->addFeature($this->buildScreenOverlay($value));
                    break;
                case 'GroundOverlay':
                    $container->addFeature($this->buildGroundOverlay($value));
                    break;
                case 'Folder':
                    $container->addFeature($this->buildFolder($value));
                    break;
                case 'Document':
                    $container->addFeature($this->buildDocument($value));
                    break;
            }
        }
    }

    private function buildDocument(\SimpleXMLElement $documentXMLObject): Document
    {
        $document = new Document();
        $this->processContainer($document, $documentXMLObject);

        return $document;
    }

    private function buildFolder(\SimpleXMLElement $folderXMLObject): Folder
    {
        $folder = new Folder();

        $this->processContainer($folder, $folderXMLObject);

        return $folder;
    }

    private function buildLatLonBox(\SimpleXMLElement $latLonBoxXMLObject): LatLonBox
    {
        $latLonBox = new LatLonBox();
        $this->processKMLObject($latLonBox, $latLonBoxXMLObject);

        $latLonBoxContent = $latLonBoxXMLObject->children();

        foreach ($latLonBoxContent as $key => $value) {
            switch ($key) {
                case 'north':
                    $latLonBox->setNorth((string)$value);
                    break;
                case 'east':
                    $latLonBox->setEast((string)$value);
                    break;
                case 'west':
                    $latLonBox->setWest((string)$value);
                    break;
                case 'south':
                    $latLonBox->setSouth((string)$value);
                    break;
                case 'rotation':
                    $latLonBox->setRotation((string)$value);
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
                    $overlay->setColor((string)$value);
                    break;
                case 'drawOrder':
                    $overlay->setDrawOrder((string)$value);
                    break;
                case 'Icon':
                    $overlay->setIcon($this->buildIcon($value));
                    break;
            }
        }
    }

    private function buildGroundOverlay(\SimpleXMLElement $groundOverlayXMLObject): GroundOverlay
    {
        $groundOverlay = new GroundOverlay();
        $this->processOverlay($groundOverlay, $groundOverlayXMLObject);

        $groundOverlayContent = $groundOverlayXMLObject->children();

        foreach ($groundOverlayContent as $key => $value) {
            switch ($key) {
                case 'altitude':
                    $groundOverlay->setAltitude((string)$value);
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

    private function buildScreenOverlay(\SimpleXMLElement $screenOverlayXMLObject): ScreenOverlay
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

    private function buildPhotoOverlay(\SimpleXMLElement $overlayXMLObject): PhotoOverlay
    {
        $photoOverlay = new PhotoOverlay();

        $this->processOverlay($photoOverlay, $overlayXMLObject);

        $overlayContent = $overlayXMLObject->children();

        foreach ($overlayContent as $key => $value) {
            switch ($key) {
                case 'rotation':
                    $photoOverlay->setRotation((string)$value);
                    break;
                case 'viewVolume':
                    $photoOverlay->setViewVolume((string)$value);
                    break;
                case 'imagePyramid':
                    $photoOverlay->setImagePyramid((string)$value);
                    break;
                case 'point':
                    $photoOverlay->setPoint($this->buildPoint($value));
                    break;
                case 'shape':
                    $photoOverlay->setShape((string)$value);
                    break;
            }
        }

        return $photoOverlay;
    }

    private function buildCamera(\SimpleXMLElement $cameraXMLObject): Camera
    {
        $camera = new Camera();
        $this->processKMLObject($camera, $cameraXMLObject);

        return $camera;
    }

    private function buildLookAt(\SimpleXMLElement $lookAtXMLObject): LookAt
    {
        $lookAt = new LookAt();
        $this->processKMLObject($lookAt, $lookAtXMLObject);

        $lookAtContent = $lookAtXMLObject->children();

        foreach ($lookAtContent as $key => $value) {
            switch ($key) {
                case 'longitude':
                    $lookAt->setLongitude((string)$value);
                    break;
                case 'latitude':
                    $lookAt->setLatitude((string)$value);
                    break;
                case 'altitude':
                    $lookAt->setAltitude((string)$value);
                    break;
                case 'heading':
                    $lookAt->setHeading((string)$value);
                    break;
                case 'tilt':
                    $lookAt->setTilt((string)$value);
                    break;
                case 'range':
                    $lookAt->setRange((string)$value);
                    break;
                case 'altitudeMode':
                    $lookAt->setAltitudeMode($this->buildAltitudeMode($value));
                    break;
            }
        }

        return $lookAt;
    }

    private function buildModel(\SimpleXMLElement $modelXMLObject): Model
    {
        $model = new Model();
        $this->processKMLObject($model, $modelXMLObject);

        $modelContent = $modelXMLObject->children();

        foreach ($modelContent as $key => $value) {
            switch ($key) {
                case 'altitudeMode':
                    $model->setAltitudeMode($this->buildAltitudeMode($value));
                    break;
                case 'location':
                    $model->setLocation((string)$value);
                    break;
                case 'orientation':
                    $model->setOrientation((string)$value);
                    break;
                case 'scale':
                    $model->setScale((string)$value);
                    break;
                case 'link':
                    $model->setLink((string)$value);
                    break;
                case 'resourceMap':
                    $model->setResourceMap((string)$value);
                    break;
            }
        }

        return $model;
    }

    private function buildPlacemark(\SimpleXMLElement $placemarkXMLObject): Placemark
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

    private function buildMultiGeometry(\SimpleXMLElement $multiGeometryXMLObject): MultiGeometry
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


    private function build(string $elementType, \SimpleXMLElement $value): ?Geometry
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

    private function buildPoint(\SimpleXMLElement $pointXMLObject): Point
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
                    $point->setCoordinate($this->buildCoordinates($value));
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
                    $coordinates = explode(" ", trim((string)$value));
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
                    $simple->setExtrude((string)$value);
                    break;
                case 'tessellate':
                    $simple->setTessellate((string)$value);
                    break;
                case 'altitudeMode':
                    $simple->setAltitudeMode($this->buildAltitudeMode($value));
                    break;
            }
        }
    }

    private function buildLineString(\SimpleXMLElement $lineStringXMLObject): LineString
    {
        $lineString = new LineString();
        $this->processGeometry($lineString, $lineStringXMLObject);

        $lineStringContent = $lineStringXMLObject->children();

        $this->processLine($lineString, $lineStringContent);
        return $lineString;
    }

    private function buildLinearRing(\SimpleXMLElement $linearRingXMLObject): LinearRing
    {
        $linearRing = new LinearRing();
        $this->processGeometry($linearRing, $linearRingXMLObject);

        $linearRingContent = $linearRingXMLObject->children();

        $this->processLine($linearRing, $linearRingContent);
        return $linearRing;
    }

    private function buildPolygon(\SimpleXMLElement $polygonXMLObject): Polygon
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

    private function buildAltitudeMode(\SimpleXMLElement $altitudeModeXMLObject): AltitudeMode
    {
        $altitudeMode = new AltitudeMode();
        $altitudeMode->setModeFromString($altitudeModeXMLObject->__toString());

        return $altitudeMode;
    }

    private function buildRefreshMode(\SimpleXMLElement $refreshModeXMLObject): RefreshMode
    {
        $refreshMode = new RefreshMode();
        $refreshMode->setModeFromString($refreshModeXMLObject->__toString());

        return $refreshMode;
    }

    private function buildCoordinates(\SimpleXMLElement $coordinatesXMLObject): Coordinates
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
                case 'BalloonStyle':
                    $style->setBalloonStyle($this->buildBalloonStyle($value));
                    break;
                case 'IconStyle':
                    $style->setIconStyle($this->buildIconStyle($value));
                    break;
                case 'LabelStyle':
                    $style->setLabelStyle($this->buildLabelStyle($value));
                    break;
                case 'LineStyle':
                    $style->setLineStyle($this->buildLineStyle($value));
                    break;
                case 'ListStyle':
                    $style->setListStyle($this->buildListStyle($value));
                    break;
                case 'PolyStyle':
                    $style->setPolyStyle($this->buildPolyStyle($value));
                    break;
            }
        }

        return $style;
    }

    private function buildPair(\SimpleXMLElement $pairXMLObject): Pair
    {
        $pair = new Pair();
        $this->processKMLObject($pair, $pairXMLObject);

        $pairContent = $pairXMLObject->children();

        foreach ($pairContent as $key => $value) {
            switch ($key) {
                case 'key':
                    $pair->setKey((string)$value);
                    break;
                case 'styleUrl':
                    $pair->setStyleUrl((string)$value);
                    break;
            }
        }

        return $pair;
    }

    private function buildStyleMap(\SimpleXMLElement $styleMapXMLObject): StyleMap
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

    private function buildListItemType(\SimpleXMLElement $listItemTypeXMLObject): ListItemType
    {
        $listItemType = new ListItemType();
        $listItemType->setModeFromString($listItemTypeXMLObject);

        return $listItemType;
    }

    private function buildItemIcon(\SimpleXMLElement $itemIconXMLObject): ItemIcon
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

    private function buildListStyle(\SimpleXMLElement $listStyleXMLObject): ListStyle
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
                    $listStyle->setBgColor((string)$value);
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

    private function buildBalloonStyle(\SimpleXMLElement $balloonStyleXMLObject): BalloonStyle
    {
        $balloonStyle = new BalloonStyle();
        $this->processSubStyle($balloonStyle, $balloonStyleXMLObject);

        $balloonStyleContent = $balloonStyleXMLObject->children();
        foreach ($balloonStyleContent as $key => $value) {
            switch ($key) {
                case 'bgColor':
                    $balloonStyle->setBgColor((string)$value);
                    break;
                case 'textColor':
                    $balloonStyle->setTextColor((string)$value);
                    break;
                case 'text':
                    $balloonStyle->setText((string)$value);
                    break;
            }
        }

        return $balloonStyle;
    }

    private function buildColorMode(\SimpleXMLElement $colorModeXMLObject): ColorMode
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
                    $colorStyle->setColor((string)$value);
                    break;
                case 'colorMode':
                    $colorStyle->setColorMode($this->buildColorMode($value));
                    break;
            }
        }
    }

    private function buildLineStyle(\SimpleXMLElement $lineStyleXMLObject): LineStyle
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

    private function buildVec2Type(\SimpleXMLElement $vec2TypeXMLObject): Vec2Type
    {
        $vec2Type = new Vec2Type();

        $attributes = $vec2TypeXMLObject->attributes();

        foreach ($attributes as $key => $value) {
            switch ($key) {
                case 'x':
                    $vec2Type->setX((string)$value);
                    break;
                case 'y':
                    $vec2Type->setY((string)$value);
                    break;
                case 'xunits':
                    $vec2Type->setXUnits((string)$value);
                    break;
                case 'yunits':
                    $vec2Type->setYUnits((string)$value);
                    break;
            }
        }

        return $vec2Type;
    }

    private function buildIconStyle(\SimpleXMLElement $iconStyleXMLObject): IconStyle
    {
        $iconStyle = new IconStyle();
        $this->processColorStyle($iconStyle, $iconStyleXMLObject);

        $iconStyleContent = $iconStyleXMLObject->children();
        foreach ($iconStyleContent as $key => $value) {
            switch ($key) {
                case 'scale':
                    $iconStyle->setScale((string)$value);
                    break;
                case 'heading':
                    $iconStyle->setHeading((string)$value);
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

    private function buildLabelStyle(\SimpleXMLElement $labelStyleXMLObject): LabelStyle
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

    private function buildPolyStyle(\SimpleXMLElement $polyStyleXMLObject): PolyStyle
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

    private function buildRegion(\SimpleXMLElement $regionXMLObject): Region
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

    private function buildIcon(\SimpleXMLElement $iconXMLObject): Icon
    {
        $icon = new Icon();
        $this->processKMLObject($icon, $iconXMLObject);

        $iconContent = $iconXMLObject->children();

        foreach ($iconContent as $key => $value) {
            switch ($key) {
                case 'href':
                    $icon->setHref((string)$value);
                    break;
                case 'refreshInterval':
                    $icon->setRefreshInterval((string)$value);
                    break;
                case 'viewRefreshTime':
                    $icon->setViewRefreshTime((string)$value);
                    break;
                case 'viewBoundScale':
                    $icon->setViewBoundScale((string)$value);
                    break;
                case 'viewFormat':
                    $icon->setViewFormat((string)$value);
                    break;
                case 'httpQuery':
                    $icon->setHttpQuery((string)$value);
                    break;
                case 'refreshMode':
                    $icon->setRefreshMode($this->buildRefreshMode($value));
                    break;
                case 'viewRefreshMode':
                    $icon->setViewRefreshMode((string)$value);
                    break;
            }
        }

        return $icon;
    }

    private function buildAuthor(\SimpleXMLElement $authorXMLObject): Author
    {
        $author = new Author();

        $author->setName((string)$authorXMLObject->name);
        $author->setUri((string)$authorXMLObject->uri);
        $author->setEmail((string)$authorXMLObject->email);

        return $author;
    }

    private function buildTimeStamp(\SimpleXMLElement $kmlXMLObject): TimeStamp
    {
        $kml = new TimeStamp();
        $kml->setWhen((string)$kmlXMLObject->when);

        return $kml;
    }

    private function buildTimeSpan(\SimpleXMLElement $kmlXMLObject): TimeSpan
    {
        $kml = new TimeSpan();
        $kml->setBegin((string)$kmlXMLObject->begin);
        $kml->setEnd((string)$kmlXMLObject->end);

        return $kml;
    }
}
