<?php

namespace LibKml\Tests\Reader\Kml\TimePrimitive;

use LibKml\Reader\Kml\TimePrimitive\TimePrimitiveExtractor;
use LibKml\Reader\Kml\TimePrimitive\TimePrimitive;
use PHPUnit\Framework\TestCase;
use SimpleXMLElement;

class TimePrimitiveExtractorTest extends TestCase {

  const KML_TIME_SPAN = <<<'TAG'
<Placemark id="placemark-1" targetId="target-1">
  <name>My office</name>  
  <Camera>
    <longitude>170.157</longitude>
    <latitude>-43.671</latitude>
    <altitude>9700</altitude>
    <heading>-6.333</heading>
    <tilt>33.5</tilt>
    <roll>12.5</roll>
    <TimeSpan>
      <begin>2021-09-12T15:07:35.678</begin>
      <end>2021-09-12T16:14:18.765</end>
    </TimeSpan>
  </Camera>
  <styleUrl>#myIconStyle</styleUrl>  
  <Point>
    <coordinates>-122.087461,37.422069</coordinates>
  </Point>
</Placemark>
TAG;

  const KML_TIME_STAMP = <<<'TAG'
<Placemark id="placemark-1" targetId="target-1">
  <name>My office</name>  
  <Camera>
    <longitude>170.157</longitude>
    <latitude>-43.671</latitude>
    <altitude>9700</altitude>
    <heading>-6.333</heading>
    <tilt>33.5</tilt>
    <roll>12.5</roll>
    <TimeStamp>
      <when>2021-09-12T15:07:35.678</when>
    </TimeStamp>
  </Camera>
  <styleUrl>#myIconStyle</styleUrl>  
  <Point>
    <coordinates>-122.087461,37.422069</coordinates>
  </Point>
</Placemark>
TAG;

  const KML_NO_TIME_PRIMITIVE = <<<'TAG'
<Placemark id="placemark-1" targetId="target-1">
  <name>My office</name>  
  <Camera>
    <longitude>170.157</longitude>
    <latitude>-43.671</latitude>
    <altitude>9700</altitude>
    <heading>-6.333</heading>
    <tilt>33.5</tilt>
    <roll>12.5</roll>
  </Camera>
  <styleUrl>#myIconStyle</styleUrl>  
  <Point>
    <coordinates>-122.087461,37.422069</coordinates>
  </Point>
</Placemark>
TAG;

  /**
   * @var SimpleXMLElement
   */
  protected $timeSpanKml;

  /**
   * @var SimpleXMLElement
   */
  protected $timeStampKml;

  /**
   * @var SimpleXMLElement
   */
  protected $noTimePrimitive;

  /**
   * @var TimePrimitive
   */
  protected $timePrimitive;

  public function setUp() {
    $this->timeSpanKml = simplexml_load_string(self::KML_TIME_SPAN);
    $this->timeStampKml = simplexml_load_string(self::KML_TIME_STAMP);
    $this->noTimePrimitive = simplexml_load_string(self::KML_NO_TIME_PRIMITIVE);
  }

  public function testExtractBegin() {
    $this->timePrimitive = TimePrimitiveExtractor::extract($this->timeSpanKml->Camera);
    $this->assertEquals('2021-09-12T15:07:35.678', $this->timePrimitive->getBegin());
  }

  public function testExtractEnd() {
    $this->timePrimitive = TimePrimitiveExtractor::extract($this->timeSpanKml->Camera);
    $this->assertEquals('2021-09-12T16:14:18.765', $this->timePrimitive->getEnd());
  }

  public function testExtractWhen() {
    $this->timePrimitive = TimePrimitiveExtractor::extract($this->timeStampKml->Camera);
    $this->assertEquals('2021-09-12T15:07:35.678', $this->timePrimitive->getWhen());
  }

  public function testExtractNoTimePrimitive() {
    $this->timePrimitive = TimePrimitiveExtractor::extract($this->noTimePrimitive->Camera);
    $this->assertNull($this->timePrimitive);
  }

}
