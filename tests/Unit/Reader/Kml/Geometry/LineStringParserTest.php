<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Coordinates;
use LibKml\Reader\Kml\Geometry\LineStringParser;
use PHPUnit\Framework\TestCase;

final class LineStringParserTest extends TestCase
{
    public const KML_LINE_STRING = <<<'TAG'
<LineString id="line-string-1" targetId="target-id-1">
  <extrude>1</extrude>
  <tessellate>1</tessellate>
  <altitudeMode>absolute</altitudeMode>
  <coordinates>
    -122.365662,37.826988,0
    -122.365202,37.826302,0
    -122.364581,37.82655,0
    -122.365038,37.827237,0
    -122.365662,37.826988,0
  </coordinates>
</LineString>
TAG;

    /**
     * @var LineStringParser
     */
    protected $lineString;
    protected $kmlElement;

    protected function setUp(): void
    {
        $this->lineString = new LineStringParser();
        $this->kmlElement = simplexml_load_string(self::KML_LINE_STRING);
    }

    public function testParse(): void
    {
        $kmlObject = $this->lineString->parse($this->kmlElement);

        self::assertEquals('line-string-1', $kmlObject->getId());
        self::assertEquals('target-id-1', $kmlObject->getTargetId());
        self::assertTrue($kmlObject->getExtrude());
        self::assertTrue($kmlObject->getTessellate());
        self::assertEquals(AltitudeMode::ABSOLUTE, $kmlObject->getAltitudeMode());
        self::assertCount(5, $kmlObject->getCoordinates());
        self::assertContainsOnlyInstancesOf(Coordinates::class, $kmlObject->getCoordinates());
    }
}
