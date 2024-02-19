<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Vec2;
use LibKml\Reader\Kml\FieldType\Vec2Parser;
use PHPUnit\Framework\TestCase;

final class Vec2ParserTest extends TestCase
{
    private const KML_VEC2_STYLE = <<<'TAG'
<hotSpot x="0.75" y="2.5" xunits="pixels" yunits="insetPixels" />
TAG;

    private $vec2KmlElement;

    private Vec2 $vec2;

    protected function setUp(): void
    {
        $this->vec2KmlElement = simplexml_load_string(self::KML_VEC2_STYLE);
        $this->vec2 = Vec2Parser::parse($this->vec2KmlElement);
    }

    public function testX(): void
    {
        self::assertEquals(0.75, $this->vec2->getX());
    }

    public function testY(): void
    {
        self::assertEquals(2.5, $this->vec2->getY());
    }

    public function testXUnit(): void
    {
        self::assertEquals('pixels', $this->vec2->getXUnits());
    }

    public function testYUnit(): void
    {
        self::assertEquals('insetPixels', $this->vec2->getYUnits());
    }
}
