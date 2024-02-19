<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\FieldType;

use LibKml\Domain\FieldType\Vec2;
use PHPUnit\Framework\TestCase;

final class Vec2Test extends TestCase
{
    /**
     * @var Vec2
     */
    protected $vec2;

    protected function setUp(): void
    {
        $this->vec2 = new Vec2();
    }

    public function testXField(): void
    {
        $x = 167;

        $this->vec2->setX($x);

        self::assertEquals($x, $this->vec2->getX());
    }

    public function testYField(): void
    {
        $y = 167;

        $this->vec2->setY($y);

        self::assertEquals($y, $this->vec2->getY());
    }

    public function testXUnitsField(): void
    {
        $xUnits = 'pixels';

        $this->vec2->setXUnits($xUnits);

        self::assertEquals($xUnits, $this->vec2->getXUnits());
    }

    public function testYUnitsField(): void
    {
        $yUnits = 'pixels';

        $this->vec2->setYUnits($yUnits);

        self::assertEquals($yUnits, $this->vec2->getYUnits());
    }
}
