<?php
namespace KML;

abstract class KMLObject
{
    protected $id;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
  
    abstract public function __toString(): string;
}
