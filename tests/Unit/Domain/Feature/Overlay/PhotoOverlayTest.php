<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\ImagePyramid;
use LibKml\Domain\Feature\Overlay\PhotoOverlay;
use LibKml\Domain\Feature\Overlay\ViewVolume;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class PhotoOverlayTest extends TestCase
{
    private PhotoOverlay $photoOverlay;

    protected function setUp(): void
    {
        $this->photoOverlay = new PhotoOverlay();
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitPhotoOverlay')
          ->with(self::equalTo($this->photoOverlay));

        $this->photoOverlay->accept($objectVisitor);
    }

    public function testRotationField(): void
    {
        $rotation = 13.24;

        $this->photoOverlay->setRotation($rotation);

        self::assertEquals($rotation, $this->photoOverlay->getRotation());
    }

    public function testViewVolumeField(): void
    {
        $viewVolume = new ViewVolume();

        $this->photoOverlay->setViewVolume($viewVolume);

        self::assertEquals($viewVolume, $this->photoOverlay->getViewVolume());
    }

    public function testImagePyramidField(): void
    {
        $imagePyramid = new ImagePyramid();

        $this->photoOverlay->setImagePyramid($imagePyramid);

        self::assertEquals($imagePyramid, $this->photoOverlay->getImagePyramid());
    }

    public function testPointField(): void
    {
        $point = new Coordinates();

        $this->photoOverlay->setPoint($point);

        self::assertEquals($point, $this->photoOverlay->getPoint());
    }

    public function testShapeField(): void
    {
        $shape = 'cylinder';

        $this->photoOverlay->setShape($shape);

        self::assertEquals($shape, $this->photoOverlay->getShape());
    }
}
