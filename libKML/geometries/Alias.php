<?php
namespace libKML;

/**
 *  Alias class
 */

require_once("KMLObject.php");

class Alias extends KMLObject {
  public $targetHref;
  public $sourceHref;
}

?>