<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\FieldType\Orientation;
use LibKml\Domain\FieldType\ResourceMap;
use LibKml\Domain\KmlObject;
use LibKml\Domain\Link;
use LibKml\Reader\Kml\Geometry\ModelParser;
use PHPUnit\Framework\TestCase;

final class ModelParserTest extends TestCase
{
    private const KML_MODEL = <<<'TAG'
<Model id="model-1" targetId="target-id-1">
  <altitudeMode>absolute</altitudeMode>
  <Location>
    <longitude>39.55375305703105</longitude>
    <latitude>-118.9813220168456</latitude>
    <altitude>1223</altitude>
  </Location>
  <Orientation>
    <heading>45.2</heading>
    <tilt>10.7</tilt>
    <roll>0.34</roll>
  </Orientation>
  <Scale>
    <x>1.0</x>
    <y>1.0</y>
    <z>1.0</z>
  </Scale>
  <Link>
    <href>house.dae</href>
    <refreshMode>once</refreshMode>
  </Link>
  <ResourceMap>
    <Alias>
      <targetHref>../files/CU-Macky---Center-StairsnoCulling.jpg</targetHref>
      <sourceHref>CU-Macky---Center-StairsnoCulling.jpg</sourceHref>
    </Alias>
    <Alias>
      <targetHref>../files/CU-Macky-4sideturretnoCulling.jpg</targetHref>
      <sourceHref>CU-Macky-4sideturretnoCulling.jpg</sourceHref>
    </Alias>
    <Alias>
      <targetHref>../files/CU-Macky-Back-NorthnoCulling.jpg</targetHref>
      <sourceHref>CU-Macky-Back-NorthnoCulling.jpg</sourceHref>
    </Alias>
  </ResourceMap>
</Model>
TAG;

    private ModelParser $modelParser;

    /**
     * @var Model
     */
    private KmlObject $model;

    private $kmlElement;

    protected function setUp(): void
    {
        $this->modelParser = new ModelParser();
        $this->kmlElement = simplexml_load_string(self::KML_MODEL);
        $this->model = $this->modelParser->parse($this->kmlElement);
    }

    public function testParseId(): void
    {
        self::assertEquals('model-1', $this->model->getId());
    }

    public function testParseTargetId(): void
    {
        self::assertEquals('target-id-1', $this->model->getTargetId());
    }

    public function testParseAltitudeMode(): void
    {
        self::assertEquals(AltitudeMode::ABSOLUTE, $this->model->getAltitudeMode());
    }

    public function testParseLocation(): void
    {
        self::assertEquals(Coordinates::fromLonLatAlt(39.55375305703105, -118.9813220168456, 1223), $this->model->getLocation());
    }

    public function testParseOrientation(): void
    {
        self::assertEquals(Orientation::fromHeadingTiltRoll(45.2, 10.7, 0.34), $this->model->getOrientation());
    }

    public function testParseLink(): void
    {
        self::assertInstanceOf(Link::class, $this->model->getLink());
    }

    public function testParseResourceMap(): void
    {
        self::assertInstanceOf(ResourceMap::class, $this->model->getResourceMap());
    }
}
