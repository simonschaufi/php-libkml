<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Orientation;
use LibKml\Reader\Kml\FieldType\OrientationParser;
use PHPUnit\Framework\TestCase;

final class OrientationParserTest extends TestCase
{
    private const KML_ORIENTATION = <<<'TAG'
<Orientation>
  <heading>45.8</heading>
  <tilt>10.1</tilt>
  <roll>3.75</roll>
</Orientation>
TAG;

    private Orientation $orientation;

    protected function setUp(): void
    {
        $element = simplexml_load_string(self::KML_ORIENTATION);

        $this->orientation = OrientationParser::parse($element);
    }

    public function testParseOrientation(): void
    {
        self::assertInstanceOf(Orientation::class, $this->orientation);
    }

    public function testParseHeading(): void
    {
        self::assertEquals(45.8, $this->orientation->getHeading());
    }

    public function testParseTilt(): void
    {
        self::assertEquals(10.1, $this->orientation->getTilt());
    }

    public function testParseRoll(): void
    {
        self::assertEquals(3.75, $this->orientation->getRoll());
    }
}
