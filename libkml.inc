<?php

/**
 * 
 *
 * File containing general imports and definitions
 *
 * @package libkml
 */

/**
 * Version of the library
 */
define('LIBKML_VERSION', '0.1');


/**
 * KML default schema version
 */
define('KML_DEFAULT_SCHEMA_VERSION', '2.2');

/**
 * KML default encoding
 */
define('KML_DEFAULT_ENCODING', 'UTF-8');

/**
 * @var 	If exists geoPHP library
 */
if (class_exists('geoPHP')) {
  define ('WITH_GEOPHP', 1);
} else {
  define ('WITH_GEOPHP', 0);
}

/*
 *  Extended geoJSON features types 
 */
define('EXTGEOJSON_FEATURE_PLACEMARK', 1);
define('EXTGEOJSON_FEATURE_OVERLAY', 2);


/*
 * Objects
 */
include_once('libKML/KML.php');
include_once('libKML/KMLBuilder.php');
include_once('libKML/KMLObject.php');
include_once('libKML/Icon.php');
include_once('libKML/features/AltitudeMode.php');
include_once('libKML/features/Feature.php');
include_once('libKML/features/NetworkLink.php');
include_once('libKML/features/Placemark.php');
include_once('libKML/features/containers/Container.php');
include_once('libKML/features/containers/Document.php');
include_once('libKML/features/containers/Folder.php');
include_once('libKML/features/overlays/LatLonBox.php');
include_once('libKML/features/overlays/Overlay.php');
include_once('libKML/features/overlays/GroundOverlay.php');
include_once('libKML/features/overlays/ScreenOverlay.php');
include_once('libKML/field_types/Coordinates.php');
include_once('libKML/field_types/RefreshMode.php');
include_once('libKML/field_types/ColorMode.php');
include_once('libKML/field_types/ListItemType.php');
include_once('libKML/field_types/Vec2Type.php');
include_once('libKML/geometries/Geometry.php');
include_once('libKML/geometries/Point.php');
include_once('libKML/geometries/LineString.php');
include_once('libKML/geometries/LinearRing.php');
include_once('libKML/geometries/Polygon.php');
include_once('libKML/style_selectors/Pair.php');
include_once('libKML/style_selectors/StyleSelector.php');
include_once('libKML/style_selectors/Style.php');
include_once('libKML/style_selectors/StyleMap.php');
include_once('libKML/sub_styles/SubStyle.php');
include_once('libKML/sub_styles/ListStyle.php');
include_once('libKML/sub_styles/BalloonStyle.php');
include_once('libKML/sub_styles/color_styles/ColorStyle.php');
include_once('libKML/sub_styles/color_styles/LineStyle.php');
include_once('libKML/sub_styles/color_styles/LabelStyle.php');
include_once('libKML/sub_styles/color_styles/IconStyle.php');
include_once('libKML/sub_styles/color_styles/PolyStyle.php');
include_once('libKML/views/AbstractView.php');
include_once('libKML/views/Camera.php');
include_once('libKML/views/LookAt.php');


function parseKML($data) {
  return libKML\buildKML(new \SimpleXMLElement($data));
}

?>