<?php
namespace KML;

use KML\Features\AltitudeMode;
use KML\Features\Containers\Document;
use KML\Features\Containers\Folder;
use KML\Features\NetworkLink;
use KML\Features\Overlays\GroundOverlay;
use KML\Features\Overlays\LatLonBox;
use KML\Features\Overlays\ScreenOverlay;
use KML\Features\Placemark;
use KML\FieldTypes\Atom\Author;
use KML\FieldTypes\ColorMode;
use KML\FieldTypes\Coordinates;
use KML\FieldTypes\ItemIconState;
use KML\FieldTypes\ListItemType;
use KML\FieldTypes\RefreshMode;
use KML\FieldTypes\Vec2Type;
use KML\Geometries\LinearRing;
use KML\Geometries\LineString;
use KML\Geometries\MultiGeometry;
use KML\Geometries\Point;
use KML\Geometries\Polygon;
use KML\StyleSelectors\Pair;
use KML\StyleSelectors\Style;
use KML\StyleSelectors\StyleMap;
use KML\SubStyles\BalloonStyle;
use KML\SubStyles\ColorStyles\IconStyle;
use KML\SubStyles\ColorStyles\LabelStyle;
use KML\SubStyles\ColorStyles\LineStyle;
use KML\SubStyles\ColorStyles\PolyStyle;
use KML\SubStyles\ItemIcon;
use KML\SubStyles\ListStyle;
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
        $root_objects = array('Document', 'Placemark', 'Folder', 'NetworkLink');

        foreach ($featureXMLObject as $key => $value) {
            if (in_array($key, $root_objects)) {
                $kml->setFeature($builder->{'build' . $key}($value));
            }
        }

        return $kml;
    }
    /**
     *  KMLBuilder
     *
     *  Builds KML Objects
     */

    private function processKMLObject(&$object, $objectXMLObject)
    {
        $attributes = $objectXMLObject->attributes();

        foreach ($attributes as $key => $value) {
            if ($key == 'id') {
                $object->setId((string)$value);
            }
        }
    }

    private function processAbstractView(&$abstractView, $abstractViewXMLObject)
    {
        $this->processKMLObject($abstractView, $abstractViewXMLObject);
    }

    private function processFeature(&$feature, $featureXMLObject)
    {
        $this->processKMLObject($feature, $featureXMLObject);

        $featureContent = $featureXMLObject->children();

        $simple_properties = array(
            'name',
            'visibility',
            'open',
            'address',
            'phoneNumber',
            'Snippet',
            'description',
            'styleUrl'
        );
        $object_properties = array('Region');

        foreach ($featureContent as $key => $value) {
            if (in_array($key, $simple_properties)) {
                call_user_func(array($feature, 'set' . ucfirst($key)), $value->__toString());
            } elseif (in_array($key, $object_properties)) {
                call_user_func(array($feature, 'set' . ucfirst($key)),
                    $this->{'build' . ucfirst($key)}($value)
                );
            } elseif ($key == 'Camera' || $key == 'LookAt') {
                $feature->setAbstractView($this->{'build' . $key}($value));
            } elseif ($key == 'TimeStamp' || $key == 'TimeSpan') {
                $feature->setTimePrimitive($this->{'build' . $key}($value));
            } elseif ($key == 'Style' || $key == 'StyleMap') {
                $feature->addStyleSelector($this->{'build'.$key}($value));
            } elseif ($key == 'atom:author') {
                $feature->setAuthor($this->buildAuthor($value));
            }
        }
    }

    private function buildNetworkLink($networkLinkXMLObject)
    {
        $networkLink = new NetworkLink();
        $this->processFeature($networkLink, $networkLinkXMLObject);

        return $networkLink;
    }

    private function processContainer(&$container, $containerXMLObject)
    {
        $this->processFeature($container, $containerXMLObject);

        $containerContent = $containerXMLObject->children();

        $object_properties = array(
            'NetworkLink',
            'Placemark',
            'PhotoOverlay',
            'ScreenOverlay',
            'GroundOverlay',
            'Folder',
            'Document'
        );

        foreach ($containerContent as $key => $value) {
            if (in_array($key, $object_properties)) {
                $container->addFeature($this->{'build' . ucfirst($key)}($value));
            }
        }
    }

    private function buildDocument($documentXMLObject)
    {
        $document = new Document();
        $this->processContainer($document, $documentXMLObject);

        return $document;
    }

    private function buildFolder($folderXMLObject)
    {
        $folder = new Folder();

        $this->processContainer($folder, $folderXMLObject);

        return $folder;
    }

    private function buildLatLonBox($latLonBoxXMLObject)
    {
        $latLonBox = new LatLonBox();
        $this->processKMLObject($latLonBox, $latLonBoxXMLObject);

        $latLonBoxContent = $latLonBoxXMLObject->children();

        $simple_properties = array('north', 'east', 'west', 'south', 'rotation');
        foreach ($latLonBoxContent as $key => $value) {
            if (in_array($key, $simple_properties)) {
                call_user_func(array($latLonBox, 'set' . ucfirst($key)), $value->__toString());
            }
        }

        return $latLonBox;
    }

    private function processOverlay(&$overlay, $overlayXMLObject)
    {
        $this->processFeature($overlay, $overlayXMLObject);

        $overlayContent = $overlayXMLObject->children();

        foreach ($overlayContent as $key => $value) {
            if ($key == 'color') {
                $overlay->setColor($value->__toString());
            } elseif ($key == 'drawOrder') {
                $overlay->setDrawOrder($value->__toString());
            } elseif ($key == 'Icon') {
                $overlay->setIcon($this->buildIcon($value));
            }
        }

    }

    private function buildGroundOverlay($groundOverlayXMLObject)
    {
        $groundOverlay = new GroundOverlay();
        $this->processOverlay($groundOverlay, $groundOverlayXMLObject);

        $groundOverlayContent = $groundOverlayXMLObject->children();

        foreach ($groundOverlayContent as $key => $value) {
            if ($key == 'altitude') {
                $groundOverlay->setAltitude($value->__toString());
            } elseif ($key == 'altitudeMode') {
                $groundOverlay->setAltitudeMode($this->buildAltitudeMode($value));
            } elseif ($key == 'LatLonBox') {
                $groundOverlay->setLatLonBox($this->buildLatLonBox($value));
            }
        }

        return $groundOverlay;
    }

    private function buildScreenOverlay($screenOverlayXMLObject)
    {
        $screenOverlay = new ScreenOverlay();

        $this->processOverlay($screenOverlay, $screenOverlayXMLObject);

        $screenOverlayContent = $screenOverlayXMLObject->children();

        foreach ($screenOverlayContent as $key => $value) {
            if ($key == 'rotation') {
                $screenOverlay->setRotation((string)$value);
            } elseif ($key == 'overlayXY') {
                $screenOverlay->setOverlayXY($this->buildVec2Type($value));
            } elseif ($key == 'screenXY') {
                $screenOverlay->setScreenXY($this->buildVec2Type($value));
            } elseif ($key == 'rotationXY') {
                $screenOverlay->setRotationXY($this->buildVec2Type($value));
            } elseif ($key == 'size') {
                $screenOverlay->setSize($this->buildVec2Type($value));
            }
        }

        return $screenOverlay;
    }

    private function buildCamera($cameraXMLObject)
    {
        $camera = new Camera();
        $this->processAbstractView($camera, $cameraXMLObject);

        return $camera;
    }

    private function buildLookAt($lookAtXMLObject)
    {
        $lookAt = new LookAt();
        $this->processAbstractView($lookAt, $lookAtXMLObject);

        $lookAtContent = $lookAtXMLObject->children();

        $simple_properties = array('longitude', 'latitude', 'altitude', 'heading', 'tilt', 'range');

        foreach ($lookAtContent as $key => $value) {
            if (in_array($key, $simple_properties)) {
                call_user_func(array($lookAt, 'set' . ucfirst($key)), $value->__toString());
            } elseif ($key == 'altitudeMode') {
                $lookAt->setAltitudeMode($this->buildAltitudeMode($value));
            }
        }

        return $lookAt;
    }

    private function buildPlacemark($placemarkXMLObject)
    {
        $placemark = new Placemark();

        $this->processFeature($placemark, $placemarkXMLObject);
        $placemarkContent = $placemarkXMLObject->children();

        $geometry_properties = array('Point', 'LineString', 'LinearRing', 'Polygon', 'MultiGeometry', 'Model');

        foreach ($placemarkContent as $key => $value) {
            if (in_array($key, $geometry_properties)) {
                $placemark->setGeometry($this->{'build' . $key}($value));
            }
        }

        return $placemark;
    }

    private function processGeometry(&$geometry, $geometryXMLObject)
    {
        $this->processKMLObject($geometry, $geometryXMLObject);
    }

    private function buildPoint($pointXMLObject)
    {
        $point = new Point();

        $this->processGeometry($point, $pointXMLObject);
        $pointContent = $pointXMLObject->children();

        foreach ($pointContent as $key => $value) {
            if ($key == 'extrude') {
                $point->setExtrude($value);
            } elseif ($key == 'altitudeMode') {
                $point->setAltitudeMode($this->buildAltitudeMode($value));
            } elseif ($key == 'coordinates') {
                $point->setCoordinates($this->buildCoordinates($value));
            }
        }

        return $point;
    }

    private function buildLineString($lineStringXMLObject)
    {
        $lineString = new LineString();
        $this->processGeometry($lineString, $lineStringXMLObject);

        $lineStringContent = $lineStringXMLObject->children();

        $simple_properties = array('extrude', 'tessellate');

        foreach ($lineStringContent as $key => $value) {
            if (in_array($key, $simple_properties)) {
                call_user_func(array($lineString, 'set' . ucfirst($key)), $value->__toString());
            } elseif ($key == 'altitudeMode') {
                $lineString->setAltitudeMode($this->buildAltitudeMode($value));
            } elseif ($key == 'coordinates') {
                $coordinates = explode(" ", trim($value->__toString()));
                foreach ($coordinates as $coord) {
                    if (strlen($coord)) {
                        $lineString->addCoordinate($this->buildCoordinates($coord));
                    }
                }
            }
        }

        return $lineString;
    }

    private function buildLinearRing($linearRingXMLObject)
    {
        $linearRing = new LinearRing();
        $this->processGeometry($linearRing, $linearRingXMLObject);

        $linearRingContent = $linearRingXMLObject->children();

        $simple_properties = array('extrude', 'tessellate');

        foreach ($linearRingContent as $key => $value) {
            if (in_array($key, $simple_properties)) {
                call_user_func(array($linearRing, 'set' . ucfirst($key)), $value->__toString());
            } elseif ($key == 'altitudeMode') {
                $linearRing->setAltitudeMode($this->buildAltitudeMode($value));
            } elseif ($key == 'coordinates') {
                $coordinates = explode(" ", trim($value->__toString()));
                foreach ($coordinates as $coord) {
                    if (strlen($coord)) {
                        $linearRing->addCoordinate($this->buildCoordinates($coord));
                    }
                }
            }
        }

        return $linearRing;
    }

    private function buildMultiGeometry($multiGeometryXMLObject)
    {
        $multiGeometry = new MultiGeometry();
        $this->processGeometry($multiGeometry, $multiGeometryXMLObject);

        $multiGeometryContent = $multiGeometryXMLObject->children();

        $geometries_objects = array('Point', 'LineString', 'LinearRing', 'Polygon', 'MultiGeometry', 'Model');

        foreach ($multiGeometryXMLObject as $key => $value) {
            if (in_array($key, $geometries_objects)) {
                $multiGeometry->addGeometry($this->{'build' . $key}($value));
            }
        }

        return $multiGeometry;
    }

    private function buildPolygon($polygonXMLObject)
    {
        $polygon = new Polygon();
        $this->processGeometry($polygon, $polygonXMLObject);

        $polygonContent = $polygonXMLObject->children();

        $simple_properties = array('extrude', 'tessellate');

        foreach ($polygonContent as $key => $value) {
            if (in_array($key, $simple_properties)) {
                call_user_func(array($polygon, 'set' . ucfirst($key)), $value->__toString());
            } elseif ($key == 'altitudeMode') {
                $polygon->setAltitudeMode($this->buildAltitudeMode($value));
            } elseif ($key == 'outerBoundaryIs' || $key == 'innetBoundaryIs') {
                call_user_func(array($polygon, 'set' . ucfirst($key)), $this->buildLinearRing($value->children()));
            }
        }

        return $polygon;
    }

    private function buildAltitudeMode($altitudeModeXMLObject)
    {
        $altitudeMode = new AltitudeMode();
        $altitudeMode->setModeFromString($altitudeModeXMLObject->__toString());

        return $altitudeMode;
    }

    private function buildRefreshMode($refreshModeXMLObject)
    {
        $refreshMode = new RefreshMode();
        $refreshMode->setModeFromString($refreshModeXMLObject->__toString());

        return $refreshMode;
    }

    private function buildCoordinates($coordinatesXMLObject)
    {
        $coordinates = new Coordinates();

        $coordinates_string = $coordinatesXMLObject;
        if (is_object($coordinatesXMLObject)) {
            $coordinates_string = $coordinatesXMLObject->__toString();
        }

        $coordinates_array = explode(",", $coordinates_string);

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

    private function processStyleSelector(&$styleSelector, $styleSelectorXMLObject)
    {
        $this->processKMLObject($styleSelector, $styleSelectorXMLObject);
    }

    private function buildStyle($styleXMLObject)
    {
        $style = new Style();
        $this->processStyleSelector($style, $styleXMLObject);

        $styleContent = $styleXMLObject->children();

        $object_properties = array(
            'BalloonStyle',
            'IconStyle',
            'LabelStyle',
            'LineStyle',
            'ListStyle',
            'PolyStyle'
        );
        foreach ($styleContent as $key => $value) {
            if (in_array($key, $object_properties)) {
                call_user_func(array($style, 'set' . ucfirst($key)),
                    $this->{'build' . ucfirst($key)}($value)
                );
            }
        }

        return $style;
    }

    private function buildPair($pairXMLObject)
    {
        $pair = new Pair();
        $this->processKMLObject($pair, $pairXMLObject);

        $pairContent = $pairXMLObject->children();

        foreach ($pairContent as $key => $value) {
            if ($key == 'key') {
                $pair->setKey($value->__toString());
            } elseif ($key == 'styleUrl') {
                $pair->setStyleUrl($value->__toString());
            }
        }

        return $pair;
    }

    private function buildStyleMap($styleMapXMLObject)
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

    private function processSubStyle(&$subStyle, $subStyleXMLObject)
    {
        $this->processKMLObject($subStyle, $subStyleXMLObject);
    }

    private function buildListItemType($listItemTypeXMLObject)
    {
        $listItemType = new ListItemType();
        $listItemType->setModeFromString($listItemTypeXMLObject);

        return $listItemType;
    }

    private function buildItemIcon($itemIconXMLObject)
    {
        $itemIcon = new ItemIcon();

        foreach ($itemIconXMLObject as $key => $value) {
            if ($key == 'state') {
                $itemIcon->setState(new ItemIconState((string)$value));
            } elseif ($key == 'href') {
                $itemIcon->setHref((string)$value);
            }
        }

        return $itemIcon;
    }

    private function buildListStyle($listStyleXMLObject)
    {
        $listStyle = new ListStyle();
        $this->processSubStyle($listStyle, $listStyleXMLObject);

        $listStyleContent = $listStyleXMLObject->children();
        foreach ($listStyleContent as $key => $value) {
            if ($key == 'listItemType') {
                $listStyle->setListItemType($this->buildListItemType($value));
            } elseif ($key == 'bgColor') {
                $listStyle->setBgColor($value->__toString());
            } elseif ($key == 'ItemIcon') {
                $listStyle->addItemIcon($this->buildItemIcon($value));
            } elseif ($key == 'maxSnippetLines') {
                $listStyle->setMaxSnippetLines((string)$value);
            }
        }

        return $listStyle;
    }

    private function buildBalloonStyle($balloonStyleXMLObject)
    {
        $balloonStyle = new BalloonStyle();
        $this->processSubStyle($balloonStyle, $balloonStyleXMLObject);

        $balloonStyleContent = $balloonStyleXMLObject->children();
        $simple_properties = array('bgColor', 'textColor', 'text');
        foreach ($balloonStyleContent as $key => $value) {
            if (in_array($key, $simple_properties)) {
                call_user_func(array($balloonStyle, 'set' . ucfirst($key)), $value->__toString());
            } elseif ($key == 'displayMode') {

            }
        }

        return $balloonStyle;
    }

    private function buildColorMode($colorModeXMLObject)
    {
        $colorMode = new ColorMode();
        $colorMode->setModeFromString($colorModeXMLObject);

        return $colorMode;
    }

    private function processColorStyle(&$colorStyle, $colorStyleXMLObject)
    {
        $this->processSubStyle($colorStyle, $colorStyleXMLObject);

        $colorStyleContent = $colorStyleXMLObject->children();

        foreach ($colorStyleContent as $key => $value) {
            if ($key == 'color') {
                $colorStyle->setColor($value->__toString());
            } elseif ($key == 'colorMode') {
                $colorStyle->setColorMode($this->buildColorMode($value));
            }
        }
    }

    private function buildLineStyle($lineStyleXMLObject)
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

    private function buildVec2Type($vec2TypeXMLObject)
    {
        $vec2Type = new Vec2Type();

        $attributes = $vec2TypeXMLObject->attributes();

        $class_attributes = array('x', 'y', 'xunits', 'yunits');
        foreach ($attributes as $key => $value) {
            if (in_array($key, $class_attributes)) {
                call_user_func(array($vec2Type, 'set' . ucfirst($key)), $value->__toString());
            }
        }

        return $vec2Type;
    }

    private function buildIconStyle($iconStyleXMLObject)
    {
        $iconStyle = new IconStyle();
        $this->processColorStyle($iconStyle, $iconStyleXMLObject);

        $iconStyleContent = $iconStyleXMLObject->children();
        $simple_properties = array('scale', 'heading');
        foreach ($iconStyleContent as $key => $value) {
            if (in_array($key, $simple_properties)) {
                call_user_func(array($iconStyle, 'set' . ucfirst($key)), $value->__toString());
            } elseif ($key == 'Icon') {
                $iconStyle->setIcon($this->buildIcon($value));
            } elseif ($key == 'hotSpot') {
                $iconStyle->setHotSpot($this->buildVec2Type($value));
            }
        }

        return $iconStyle;
    }


    private function buildLabelStyle($labelStyleXMLObject)
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

    private function buildPolyStyle($polyStyleXMLObject)
    {
        $polyStyle = new PolyStyle();
        $this->processColorStyle($polyStyle, $polyStyleXMLObject);

        $polyStyleContent = $polyStyleXMLObject->children();

        foreach ($polyStyleContent as $key => $value) {
            if ($key == 'fill') {
                $polyStyle->setFill((string)$value);
            } elseif ($key == 'outline') {
                $polyStyle->setOutline((string)$value);
            }
        }

        return $polyStyle;
    }

    private function buildRegion($regionXMLObject)
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

    private function buildIcon($iconXMLObject)
    {
        $icon = new Icon();
        $this->processKMLObject($icon, $iconXMLObject);

        $iconContent = $iconXMLObject->children();

        $simple_properties = array(
            'href',
            'refreshInterval',
            'viewRefreshTime',
            'viewBoundScale',
            'viewFormat',
            'httpQuery'
        );
        $object_properties = array('refreshMode', 'viewRefreshMode');

        foreach ($iconContent as $key => $value) {
            if (in_array($key, $simple_properties)) {
                call_user_func(array($icon, 'set' . ucfirst($key)), $value->__toString());
            } elseif (in_array($key, $object_properties)) {
                call_user_func(array($icon, 'set' . ucfirst($key)),
                    $this->{'build' . ucfirst($key)}($value)
                );
            }
        }

        return $icon;
    }

    private function buildAuthor($authorXMLObject)
    {
        $author = new Author();

        $author->setName($authorXMLObject->name);
        $author->setUri($authorXMLObject->uri);
        $author->setEmail($authorXMLObject->email);

        return $author;
    }

    private function buildTimeStamp($kmlXMLObject)
    {
        $kml = new TimeStamp();
        $kml->setWhen($kmlXMLObject->when);

        return $kml;
    }

    private function buildTimeSpan($kmlXMLObject)
    {
        $kml = new TimeSpan();
        $kml->setBegin($kmlXMLObject->begin);
        $kml->setEnd($kmlXMLObject->end);

        return $kml;
    }
}