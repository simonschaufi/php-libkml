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
include_once('libKML/field_types/ItemIconState.php');
include_once('libKML/field_types/RefreshMode.php');
include_once('libKML/field_types/ColorMode.php');
include_once('libKML/field_types/ListItemType.php');
include_once('libKML/field_types/Vec2Type.php');
include_once('libKML/geometries/Geometry.php');
include_once('libKML/geometries/Point.php');
include_once('libKML/geometries/LineString.php');
include_once('libKML/geometries/LinearRing.php');
include_once('libKML/geometries/Polygon.php');
include_once('libKML/geometries/MultiGeometry.php');
include_once('libKML/style_selectors/Pair.php');
include_once('libKML/style_selectors/StyleSelector.php');
include_once('libKML/style_selectors/Style.php');
include_once('libKML/style_selectors/StyleMap.php');
include_once('libKML/sub_styles/ItemIcon.php');
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
include_once('libKML/KMLBuilder.php');
include_once('libKML/time/TimePrimitive.php');
include_once('libKML/time/TimeSpan.php');
include_once('libKML/time/TimeStamp.php');


function parseKML($data) {
  return libKML\buildKML(new \SimpleXMLElement($data));
}

/**
 *   kml root element class 
 */
 
class KML {
  
  private $networkLinkControl;
  private $feature;
  private $version = KML_DEFAULT_SCHEMA_VERSION;
  private $encoding = KML_DEFAULT_ENCODING;
  
  public static function createFromText($text) {
    $enc = mb_detect_encoding($text);
    $xml = mb_convert_encoding($text, 'UTF-8', $enc);
    
    return libKML\buildKML(new \SimpleXMLElement($xml));
  }
  
  public function __construct($feature = null) {
    $this->feature = $feature;
  }
  
  public function __toString() {
    $output = array();
    
    $output[] = sprintf("<?xml version=\"1.0\" encoding=\"%s\"?>", $this->encoding);
    $output[] = sprintf("<kml xmlns=\"http://www.opengis.net/kml/%s\">", $this->version);
    
    if (isset($this->feature)) {
      $output[] = $this->feature->__toString();
    }
    
    $output[] = '</kml>';
    
    return implode("\n", $output);
  }
  
  /**
   *  Generate WKT
   */
  public function toWKT() {
    if (isset($this->feature)) {
      if ($this->feature instanceof libKML\Container) {
        return sprintf("GEOMETRYCOLLECTION(%s)", $this->feature->toWKT());
      } else {
        return $this->feature->toWKT();
      }
    }
    
    return '';
  }
  
  /**
   *  Generate WKT without z-coordenates
   */
  
  public function toWKT2d() {
    if (isset($this->feature)) {
      if ($this->feature instanceof libKML\Container) {
        return sprintf("GEOMETRYCOLLECTION(%s)", $this->feature->toWKT2d());
      } else {
        return $this->feature->toWKT2d();
      }
    }
    
    return '';
  }
  
  public function toJSON() {
    $json_data = array();
    
    if (isset($this->feature)) {
      $all_features = $this->getAllFeatures();
      
      $json_data['type'] = 'FeatureCollection';
      $json_data['features'] = array();
      
      foreach($all_features as $feature) {
        $json_feature = $feature->toJSON();
        if ($json_feature) {
         $json_data['features'][] = $json_feature;
        }
      }
    }
    
    return json_encode($json_data);
  }
  
  public function toExtGeoJSON() {
    $json_data = array();
    
    if (isset($this->feature)) {
      $all_features = $this->getAllFeatures();
      
      $json_data['type'] = 'FeatureCollection';
      $json_data['features'] = array();
      
      foreach($all_features as $feature) {
        $json_feature = $feature->toExtGeoJSON();
        if ($json_feature) {
         $json_data['features'][] = $json_feature;
        }
      }
    }
    
    return json_encode($json_data);
  }
  
  /**
   * Returns all Styles in the KML
   * @return	array   Array of styles
   */
  public function getAllStyles() {
    $all_styles = array();
    
    if (isset($this->feature)) {
      $all_styles = array_merge($all_styles, $this->feature->getAllStyles());
    }
    
    return $all_styles;
  }
  
  /**
   * Returns all features in the KML
   * @return	array   Array of Features
   */
  public function getAllFeatures() {
    $all_features = array();
    
    if (isset($this->feature)) {
      $all_features = array_merge($all_features, $this->feature->getAllFeatures());
    }
    
    return $all_features;
  }
  
  public function setFeature($feature) {
    if ($feature instanceof libKML\Feature) {
      $this->feature = $feature;
    }
  }
  
  public function getFeature() {
    return $this->feature;
  }
}
 
?>
