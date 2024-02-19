<?php

declare(strict_types=1);

namespace LibKml\Domain\Feature\Overlay;

use LibKml\Domain\FieldType\Vec2;
use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * This element draws an image overlay fixed to the screen.
 *
 * @see https://developers.google.com/kml/documentation/kmlreference#screenoverlay
 */
class ScreenOverlay extends Overlay
{
    private ?Vec2 $overlayXY = null;
    private ?Vec2 $screenXY = null;
    private ?Vec2 $rotationXY = null;
    private ?Vec2 $size = null;
    private ?float $rotation = null;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitScreenOverlay($this);
    }

    public function getOverlayXY(): ?Vec2
    {
        return $this->overlayXY;
    }

    public function setOverlayXY(Vec2 $overlayXY): void
    {
        $this->overlayXY = $overlayXY;
    }

    public function getScreenXY(): ?Vec2
    {
        return $this->screenXY;
    }

    public function setScreenXY(Vec2 $screenXY): void
    {
        $this->screenXY = $screenXY;
    }

    public function getRotationXY(): ?Vec2
    {
        return $this->rotationXY;
    }

    public function setRotationXY(Vec2 $rotationXY): void
    {
        $this->rotationXY = $rotationXY;
    }

    public function getSize(): ?Vec2
    {
        return $this->size;
    }

    public function setSize(Vec2 $size): void
    {
        $this->size = $size;
    }

    public function getRotation(): ?float
    {
        return $this->rotation;
    }

    public function setRotation(float $rotation): void
    {
        $this->rotation = $rotation;
    }
}
