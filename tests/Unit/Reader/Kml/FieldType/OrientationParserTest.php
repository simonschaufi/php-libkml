<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Orientation;
use LibKml\Reader\Kml\FieldType\OrientationParser;
use PHPUnit\Framework\TestCase;

final class OrientationParserTest extends TestCase
{
    public const KML_ORIENTATION = <<<'TAG'
<Orientation>
  <heading>45.8</heading>
  <tilt>10.1</tilt>
  <roll>3.75</roll>
</Orientation>
TAG;

    public function testParse(): void
    {
        $element = simplexml_load_string(self::KML_ORIENTATION);

        $orientation = OrientationParser::parse($element);

        self::assertInstanceOf(Orientation::class, $orientation);
        self::assertEquals(45.8, $orientation->getHeading());
        self::assertEquals(10.1, $orientation->getTilt());
        self::assertEquals(3.75, $orientation->getRoll());
    }
}
