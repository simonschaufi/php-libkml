<?php
namespace libKML;

/**
 *  KMLParser
 *
 *  Parse a KML file
 */

class KMLParser {
  
  protected static function parseKMLObject($content) {
    $object = array();
    
    $attributes = $content->attributes();
    
    if (isset($attributes['id'])) {
      $object['id'] = $attributes['id']->__toString();
    }
    
    return $object;
  }
  
  protected static function parseFeature($content) {    
    $feature = KMLParser::parseKMLObject($content);    
    
    if (isset($content->name)) {
      $feature['name'] = $content->name;
    }
    
    if (isset($content->visibility)) {
      $feature['visibility'] = $content->visibility;
    }
    
    if (isset($content->open)) {
      $feature['open'] = $content->open;
    }
    
    if (isset($content->name)) {
      $feature['name'] = $content->name;
    }
    
    if (isset($content->visibility)) {
      $feature['visibility'] = $content->visibility;
    }
    
    if (isset($content->open)) {
      $feature['open'] = $content->open;
    }
    
    if (isset($content->autor)) {
      $feature['author'] = KMLBuilder::buildAtomAuthor($content->autor);
    }
    
    
    if (isset($content->address)) {
      $feature['address'] = $content->address;
    }
    
    
    /* TODO: Implementar tipos xal
    if (isset($content->addressDetails)) {
      $feature['address'] = $content->addressDetails;
    }
    */
    
    return $feature;
  }
  
  public static function parsePlacemark($content) {
    $feature_array = KMLParser::parseFeature($content);
    
    //Load placemark properties
    if (isset($content->Geometry)) {
      $geometry_array = call_user_func('KMLparser::parse'. $content->Geometry, current($rootArray)); // KMLParser::parseGeometry($content);
    }
    
    $placemark = KMLBuilder::buildPlacemark($feature_array);

    return $placemark;
  }
  
  public static function parseAttributes($content) {
    $attributes = array();
    
    foreach($content->attributes() as $key => $value) {
      $attributes[$key] = $value;
    }
    
    return $attributes;
  }
  
}

?>