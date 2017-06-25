<?php
namespace KML\Time;

use KML\KMLObject;

abstract class TimePrimitive extends KMLObject
{
    public function __toString(): string
    {
        return '';
    }
}
