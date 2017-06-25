<?php
namespace KML\Time;

use KML\KMLObject;

/**
 *  TimePrimitive abstract class
 */

abstract class TimePrimitive extends KMLObject {
    public function __toString() {
      return "";
    }
}
?>
