<?php
namespace KML\Geometries;

use KML\KMLObject;

class Alias extends KMLObject
{
    private $targetHref;
    private $sourceHref;
  
    public function getTargetHref()
    {
        return $this->targetHref;
    }
  
    public function setTargetHref($targetHref)
    {
        $this->targetHref = $targetHref;
    }
  
    public function getSourceHref()
    {
        return $this->sourceHref;
    }
  
    public function setSourceHref($sourceHref)
    {
        $this->sourceHref = $sourceHref;
    }

    public function __toString(): string
    {
        return '';
    }
}
