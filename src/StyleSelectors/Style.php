<?php

namespace KML\StyleSelectors;

use KML\SubStyles\BalloonStyle;
use KML\SubStyles\ColorStyles\IconStyle;
use KML\SubStyles\ColorStyles\LabelStyle;
use KML\SubStyles\ColorStyles\LineStyle;
use KML\SubStyles\ColorStyles\PolyStyle;
use KML\SubStyles\ListStyle;

class Style extends StyleSelector
{
    /** @var  IconStyle */
    private $iconStyle;
    /** @var  LabelStyle */
    private $labelStyle;
    /** @var  LineStyle */
    private $lineStyle;
    /** @var  PolyStyle */
    private $polyStyle;
    /** @var  BalloonStyle */
    private $balloonStyle;
    /** @var  ListStyle */
    private $listStyle;

    public function __toString(): string
    {
        $output = [];
        $output[] = sprintf(
            "<Style%s>",
            isset($this->id) ? sprintf(" id=\"%s\"", $this->id) : ""
        );

        if (isset($this->iconStyle)) {
            $output[] = $this->iconStyle->__toString();
        }

        if (isset($this->labelStyle)) {
            $output[] = $this->labelStyle->__toString();
        }

        if (isset($this->lineStyle)) {
            $output[] = $this->lineStyle->__toString();
        }

        if (isset($this->polyStyle)) {
            $output[] = $this->polyStyle->__toString();
        }

        if (isset($this->balloonStyle)) {
            $output[] = $this->balloonStyle->__toString();
        }

        if (isset($this->listStyle)) {
            $output[] = $this->listStyle->__toString();
        }

        $output[] = "</Style>";

        return implode("\n", $output);
    }

    public function getIconStyle(): IconStyle
    {
        return $this->iconStyle;
    }

    public function setIconStyle(IconStyle $iconStyle)
    {
        $this->iconStyle = $iconStyle;
    }

    public function getLabelStyle(): LabelStyle
    {
        return $this->labelStyle;
    }

    public function setLabelStyle(LabelStyle $labelStyle)
    {
        $this->labelStyle = $labelStyle;
    }

    public function getLineStyle(): LineStyle
    {
        return $this->lineStyle;
    }

    public function setLineStyle(LineStyle $lineStyle)
    {
        $this->lineStyle = $lineStyle;
    }

    public function getPolyStyle(): PolyStyle
    {
        return $this->polyStyle;
    }

    public function setPolyStyle(PolyStyle $polyStyle)
    {
        $this->polyStyle = $polyStyle;
    }

    public function getBalloonStyle(): BalloonStyle
    {
        return $this->balloonStyle;
    }

    public function setBalloonStyle(BalloonStyle $balloonStyle)
    {
        $this->balloonStyle = $balloonStyle;
    }

    public function getListStyle(): ListStyle
    {
        return $this->listStyle;
    }

    public function setListStyle(ListStyle $listStyle)
    {
        $this->listStyle = $listStyle;
    }
}
