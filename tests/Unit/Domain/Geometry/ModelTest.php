<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Geometry;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\FieldType\Orientation;
use LibKml\Domain\FieldType\ResourceMap;
use LibKml\Domain\Geometry\Model;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\Link;
use LibKml\Domain\Scale;
use PHPUnit\Framework\TestCase;

final class ModelTest extends TestCase
{
    private Model $model;

    protected function setUp(): void
    {
        $this->model = new Model();
    }

    public function testDefaultValues(): void
    {
        self::assertEquals(AltitudeMode::CLAMP_TO_GROUND, $this->model->getAltitudeMode());
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitModel')
          ->with(self::equalTo($this->model));

        $this->model->accept($objectVisitor);
    }

    public function testAltitudeModeField(): void
    {
        $altitudeMode = 'relativeToGround';

        $this->model->setAltitudeMode($altitudeMode);

        self::assertEquals($altitudeMode, $this->model->getAltitudeMode());
    }

    public function testLocationField(): void
    {
        $location = new Coordinates();

        $this->model->setLocation($location);

        self::assertEquals($location, $this->model->getLocation());
    }

    public function testOrientationField(): void
    {
        $orientation = new Orientation();

        $this->model->setOrientation($orientation);

        self::assertEquals($orientation, $this->model->getOrientation());
    }

    public function testScaleField(): void
    {
        $scale = new Scale();

        $this->model->setScale($scale);

        self::assertEquals($scale, $this->model->getScale());
    }

    public function testLinkField(): void
    {
        $link = new Link();

        $this->model->setLink($link);

        self::assertEquals($link, $this->model->getLink());
    }

    public function testResourceMapField(): void
    {
        $resourceMap = new ResourceMap();

        $this->model->setResourceMap($resourceMap);

        self::assertEquals($resourceMap, $this->model->getResourceMap());
    }
}
