<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Reader\Kml\Geometry\PointParser;
use PHPUnit\Framework\TestCase;

final class PointParserTest extends TestCase
{
    public const KML_POINT = <<<'TAG'
<Point id="point-1" targetId="target-id-1">
  <extrude>1</extrude>
  <coordinates>-90.86948943473118,48.25450093195546</coordinates>
</Point>
TAG;

    /**
     * @var PointParser
     */
    protected $pointParser;
    protected $kmlElement;

    protected function setUp(): void
    {
        $this->pointParser = new PointParser();
        $this->kmlElement = simplexml_load_string(self::KML_POINT);
    }

    public function testParse(): void
    {
        $kmlObject = $this->pointParser->parse($this->kmlElement);

        self::assertEquals('point-1', $kmlObject->getId());
        self::assertEquals('target-id-1', $kmlObject->getTargetId());
        self::assertTrue($kmlObject->getExtrude());
        self::assertInstanceOf(Coordinates::class, $kmlObject->getCoordinates());
    }
}
