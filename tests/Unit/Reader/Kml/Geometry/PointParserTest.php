<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\Geometry\PointParser;
use PHPUnit\Framework\TestCase;

final class PointParserTest extends TestCase
{
    private const KML_POINT = <<<'TAG'
<Point id="point-1" targetId="target-id-1">
  <extrude>1</extrude>
  <coordinates>-90.86948943473118,48.25450093195546</coordinates>
</Point>
TAG;

    private PointParser $pointParser;

    /**
     * @var Point
     */
    private KmlObject $point;

    private $kmlElement;

    protected function setUp(): void
    {
        $this->pointParser = new PointParser();
        $this->kmlElement = simplexml_load_string(self::KML_POINT);
        $this->point = $this->pointParser->parse($this->kmlElement);
    }

    public function testParseId(): void
    {
        self::assertEquals('point-1', $this->point->getId());
    }

    public function testParseTargetId(): void
    {
        self::assertEquals('target-id-1', $this->point->getTargetId());
    }

    public function testParseExtrude(): void
    {
        self::assertTrue($this->point->getExtrude());
    }

    public function testParseCoordinates(): void
    {
        self::assertInstanceOf(Coordinates::class, $this->point->getCoordinates());
    }
}
