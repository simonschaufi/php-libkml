<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\Geometry\LineStringParser;
use PHPUnit\Framework\TestCase;

final class LineStringParserTest extends TestCase
{
    private const KML_LINE_STRING = <<<'TAG'
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

    private LineStringParser $lineStringParser;

    /**
     * @var LineString
     */
    private KmlObject $lineString;

    private $kmlElement;

    protected function setUp(): void
    {
        $this->lineStringParser = new LineStringParser();
        $this->kmlElement = simplexml_load_string(self::KML_LINE_STRING);
        $this->lineString = $this->lineStringParser->parse($this->kmlElement);
    }

    public function testParseId(): void
    {
        self::assertEquals('line-string-1', $this->lineString->getId());
    }

    public function testParseTargetId(): void
    {
        self::assertEquals('target-id-1', $this->lineString->getTargetId());
    }

    public function testParseExtrude(): void
    {
        self::assertTrue($this->lineString->getExtrude());
    }

    public function testParseTessellate(): void
    {
        self::assertTrue($this->lineString->getTessellate());
    }

    public function testParseAltitudeMode(): void
    {
        self::assertEquals(AltitudeMode::ABSOLUTE, $this->lineString->getAltitudeMode());
    }

    public function testParseCoordinates(): void
    {
        self::assertCount(5, $this->lineString->getCoordinates());
        self::assertContainsOnlyInstancesOf(Coordinates::class, $this->lineString->getCoordinates());
    }
}
