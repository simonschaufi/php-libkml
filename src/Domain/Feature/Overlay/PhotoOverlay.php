<?php

declare(strict_types=1);

namespace LibKml\Domain\Feature\Overlay;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * Allows to geographically locate a photograph on the Earth.
 *
 * @see https://developers.google.com/kml/documentation/kmlreference#photooverlay
 */
class PhotoOverlay extends Overlay
{
    private ?float $rotation = null;
    private ?ViewVolume $viewVolume = null;
    private ?ImagePyramid $imagePyramid = null;
    private ?Coordinates $point = null; // FIXME: is this correct?
    private string $shape = 'rectangle';

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitPhotoOverlay($this);
    }

    public function getRotation(): float
    {
        return $this->rotation;
    }

    public function setRotation(float $rotation): void
    {
        $this->rotation = $rotation;
    }

    public function getViewVolume(): ViewVolume
    {
        return $this->viewVolume;
    }

    public function setViewVolume(ViewVolume $viewVolume): void
    {
        $this->viewVolume = $viewVolume;
    }

    public function getImagePyramid(): ImagePyramid
    {
        return $this->imagePyramid;
    }

    public function setImagePyramid(ImagePyramid $imagePyramid): void
    {
        $this->imagePyramid = $imagePyramid;
    }

    public function getPoint(): Coordinates
    {
        return $this->point;
    }

    public function setPoint(Coordinates $point): void
    {
        $this->point = $point;
    }

    public function getShape(): string
    {
        return $this->shape;
    }

    public function setShape(string $shape): void
    {
        $this->shape = $shape;
    }
}
