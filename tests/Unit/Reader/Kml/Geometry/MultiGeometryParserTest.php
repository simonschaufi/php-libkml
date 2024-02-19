<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Geometry;

use LibKml\Domain\Geometry\LineString;
use LibKml\Domain\Geometry\Point;
use LibKml\Reader\Kml\Geometry\MultiGeometryParser;
use PHPUnit\Framework\TestCase;

final class MultiGeometryParserTest extends TestCase
{
    public const KML_MULTI_GEOMETRY = <<<'TAG'
<MultiGeometry>
  <Point>
    <coordinates>-122.442558793,37.80666418607323,10</coordinates>
  </Point>
  <LineString>
    <coordinates>
      -122.4425587930444,37.80666418607323,0
      -122.4428379594768,37.80663578323093,0
    </coordinates>
  </LineString>
  <LineString>
    <coordinates>
      -122.4425509770566,37.80662588061205,0
      -122.4428340530617,37.8065999493009,0
    </coordinates>
  </LineString>
</MultiGeometry>
TAG;

    /**
     * @var MultiGeometryParser
     */
    protected $multiGeometry;
    protected $kmlElement;

    protected function setUp(): void
    {
        $this->multiGeometry = new MultiGeometryParser();
        $this->kmlElement = simplexml_load_string(self::KML_MULTI_GEOMETRY);
    }

    public function testParse(): void
    {
        $kmlObject = $this->multiGeometry->parse($this->kmlElement);

        self::assertCount(3, $kmlObject->getGeometries());
        self::assertInstanceOf(Point::class, $kmlObject->getGeometries()[0]);
        self::assertInstanceOf(LineString::class, $kmlObject->getGeometries()[1]);
        self::assertInstanceOf(LineString::class, $kmlObject->getGeometries()[2]);
    }
}
