<?php

namespace KML\Features\Overlays;

use KML\Features\Feature;
use KML\Icon;

abstract class Overlay extends Feature
{
    protected $color;
    protected $drawOrder;
    /** @var  Icon */
    protected $icon;

    public function getAllFeatures()
    {
        return [$this];
    }

    public function __toString(): string
    {
        $parent_string = parent::__toString();

        $output = [];
        $output[] = $parent_string;

        if (isset($this->color)) {
            $output[] = sprintf("<color>%s</color>", $this->color);
        }

        if (isset($this->drawOrder)) {
            $output[] = sprintf("<drawOrder>%s</drawOrder>", $this->drawOrder);
        }

        if (isset($this->icon)) {
            $output[] = $this->icon->__toString();
        }

        return implode("\n", $output);
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getDrawOrder()
    {
        return $this->drawOrder;
    }

    public function setDrawOrder($drawOrder)
    {
        $this->drawOrder = $drawOrder;
    }

    public function getIcon(): Icon
    {
        return $this->icon;
    }

    public function setIcon(Icon $icon)
    {
        $this->icon = $icon;
    }
}
