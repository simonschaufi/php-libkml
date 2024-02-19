<?php

declare(strict_types=1);

namespace LibKml\Domain\StyleSelector;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\BalloonStyle;
use LibKml\Domain\SubStyle\ColorStyle\IconStyle;
use LibKml\Domain\SubStyle\ColorStyle\LabelStyle;
use LibKml\Domain\SubStyle\ColorStyle\LineStyle;
use LibKml\Domain\SubStyle\ColorStyle\PolyStyle;
use LibKml\Domain\SubStyle\ListStyle;

/**
 * A Style defines an addressable style group.
 *
 * @see https://developers.google.com/kml/documentation/kmlreference#style
 */
class Style extends StyleSelector
{
    private ?IconStyle $iconStyle = null;
    private ?LabelStyle $labelStyle = null;
    private ?LineStyle $lineStyle = null;
    private ?PolyStyle $polyStyle = null;
    private ?BalloonStyle $balloonStyle = null;
    private ?ListStyle $listStyle = null;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitStyle($this);
    }

    public function getIconStyle(): ?IconStyle
    {
        return $this->iconStyle;
    }

    public function setIconStyle(?IconStyle $iconStyle): void
    {
        $this->iconStyle = $iconStyle;
    }

    public function getLabelStyle(): ?LabelStyle
    {
        return $this->labelStyle;
    }

    public function setLabelStyle(?LabelStyle $labelStyle): void
    {
        $this->labelStyle = $labelStyle;
    }

    public function getLineStyle(): ?LineStyle
    {
        return $this->lineStyle;
    }

    public function setLineStyle(?LineStyle $lineStyle): void
    {
        $this->lineStyle = $lineStyle;
    }

    public function getPolyStyle(): ?PolyStyle
    {
        return $this->polyStyle;
    }

    public function setPolyStyle(?PolyStyle $polyStyle): void
    {
        $this->polyStyle = $polyStyle;
    }

    public function getBalloonStyle(): ?BalloonStyle
    {
        return $this->balloonStyle;
    }

    public function setBalloonStyle(?BalloonStyle $balloonStyle): void
    {
        $this->balloonStyle = $balloonStyle;
    }

    public function getListStyle(): ?ListStyle
    {
        return $this->listStyle;
    }

    public function setListStyle(?ListStyle $listStyle): void
    {
        $this->listStyle = $listStyle;
    }
}
