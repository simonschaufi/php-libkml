<?php

namespace LibKml\Tests\Reader\Kml\Geometry;

use LibKml\Domain\Geometry\LinearRing;
use LibKml\Domain\Geometry\LineString;
use LibKml\Domain\Geometry\Model;
use LibKml\Domain\Geometry\MultiGeometry;
use LibKml\Domain\Geometry\Point;
use LibKml\Domain\Geometry\Polygon;
use LibKml\Reader\Kml\Geometry\GeometryExtractor;
use PHPUnit\Framework\TestCase;

class GeometryExtractorTest extends TestCase {

  const KML_POINT = <<<'TAG'
<Placemark>
  <Point>
    <coordinates>-90.86948943473118,48.25450093195546</coordinates>
  </Point>
</Placemark>
TAG;

  const KML_LINE_STRING = <<<'TAG'
<Placemark>
  <LineString>
    <extrude>1</extrude>
    <tessellate>1</tessellate>
    <altitudeMode>relativeToGround</altitudeMode>
    <coordinates>
      -122.364167,37.824787,50 -122.363917,37.824423,50
    </coordinates>
  </LineString>
</Placemark>
TAG;

  const KML_LINEAR_RING = <<<'TAG'
<Placemark>
  <LinearRing>
    <coordinates>
      -122.365662,37.826988,0
      -122.365202,37.826302,0
      -122.364581,37.82655,0
      -122.365038,37.827237,0
      -122.365662,37.826988,0
    </coordinates>
  </LinearRing>
</Placemark>
TAG;

  const KML_POLYGON = <<<'TAG'
<Placemark>
  <Polygon>
    <extrude>1</extrude>
    <altitudeMode>relativeToGround</altitudeMode>
    <outerBoundaryIs>
      <LinearRing>
        <coordinates>
          -122.366278,37.818844,30
          -122.365248,37.819267,30
          -122.365640,37.819861,30
          -122.366669,37.819429,30
          -122.366278,37.818844,30
        </coordinates>
      </LinearRing>
    </outerBoundaryIs>
    <innerBoundaryIs>
      <LinearRing>
        <coordinates>
          -122.366212,37.818977,30
          -122.365424,37.819294,30
          -122.365704,37.819731,30
          -122.366488,37.819402,30
          -122.366212,37.818977,30
        </coordinates>
      </LinearRing>
    </innerBoundaryIs>
  </Polygon>
</Placemark>
TAG;

  const KML_MULTI_GEOMETRY = <<<'TAG'
<Placemark>
  <MultiGeometry>
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
</Placemark>
TAG;

  const KML_MODEL = <<<'TAG'
<Placemark>
  <Model id="khModel543"> 
    <altitudeMode>relativeToGround</altitudeMode> 
    <Location> 
      <longitude>39.55375305703105</longitude> 
      <latitude>-118.9813220168456</latitude> 
      <altitude>1223</altitude> 
    </Location> 
    <Orientation> 
      <heading>45.0</heading> 
      <tilt>10.0</tilt> 
      <roll>0.0</roll> 
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
</Placemark>
TAG;

  public function testExtractPoint() {
    $kmlElement = simplexml_load_string(self::KML_POINT);

    $point = GeometryExtractor::extractGeometry($kmlElement);

    $this->assertInstanceOf(Point::class, $point);
  }

  public function testExtractLineString() {
    $kmlElement = simplexml_load_string(self::KML_LINE_STRING);

    $lineString = GeometryExtractor::extractGeometry($kmlElement);

    $this->assertInstanceOf(LineString::class, $lineString);
  }

  public function testExtractLinearRing() {
    $kmlElement = simplexml_load_string(self::KML_LINEAR_RING);

    $linearRing = GeometryExtractor::extractGeometry($kmlElement);

    $this->assertInstanceOf(LinearRing::class, $linearRing);
  }

  public function testExtractPolygon() {
    $kmlElement = simplexml_load_string(self::KML_POLYGON);

    $polygon = GeometryExtractor::extractGeometry($kmlElement);

    $this->assertInstanceOf(Polygon::class, $polygon);
  }

  public function testExtractMultiGeometry() {
    $kmlElement = simplexml_load_string(self::KML_MULTI_GEOMETRY);

    $multiGeometry = GeometryExtractor::extractGeometry($kmlElement);

    $this->assertInstanceOf(MultiGeometry::class, $multiGeometry);
  }

  public function testExtractModel() {
    $kmlElement = simplexml_load_string(self::KML_MODEL);

    $model = GeometryExtractor::extractGeometry($kmlElement);

    $this->assertInstanceOf(Model::class, $model);
  }

}
