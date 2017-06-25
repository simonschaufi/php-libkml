<?php
namespace KML\Geometries;

use KML\KMLObject;

class ResourceMap extends KMLObject
{
    private $aliases;
  
    public function getAliases()
    {
        return $this->aliases;
    }
  
    public function setAliases($aliases)
    {
        $this->aliases = $aliases;
    }

    public function __toString(): string
    {
        return '';
    }
}
