<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\TimePrimitive;

use LibKml\Domain\TimePrimitive\TimePrimitive;
use LibKml\Reader\Kml\TimePrimitive\TimePrimitiveExtractor;
use PHPUnit\Framework\TestCase;

final class TimePrimitiveExtractorTest extends TestCase
{
    private const KML_TIME_SPAN = <<<'TAG'
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

    private const KML_TIME_STAMP = <<<'TAG'
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

    private const KML_NO_TIME_PRIMITIVE = <<<'TAG'
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
     * @var \SimpleXMLElement
     */
    private $timeSpanKml;

    /**
     * @var \SimpleXMLElement
     */
    private $timeStampKml;

    /**
     * @var \SimpleXMLElement
     */
    private $noTimePrimitive;

    private ?TimePrimitive $timePrimitive = null;

    protected function setUp(): void
    {
        $this->timeSpanKml = simplexml_load_string(self::KML_TIME_SPAN);
        $this->timeStampKml = simplexml_load_string(self::KML_TIME_STAMP);
        $this->noTimePrimitive = simplexml_load_string(self::KML_NO_TIME_PRIMITIVE);
    }

    public function testExtractBegin(): void
    {
        $this->timePrimitive = TimePrimitiveExtractor::extract($this->timeSpanKml->Camera);
        self::assertEquals('2021-09-12T15:07:35.678', $this->timePrimitive->getBegin());
    }

    public function testExtractEnd(): void
    {
        $this->timePrimitive = TimePrimitiveExtractor::extract($this->timeSpanKml->Camera);
        self::assertEquals('2021-09-12T16:14:18.765', $this->timePrimitive->getEnd());
    }

    public function testExtractWhen(): void
    {
        $this->timePrimitive = TimePrimitiveExtractor::extract($this->timeStampKml->Camera);
        self::assertEquals('2021-09-12T15:07:35.678', $this->timePrimitive->getWhen());
    }

    public function testExtractNoTimePrimitive(): void
    {
        $this->timePrimitive = TimePrimitiveExtractor::extract($this->noTimePrimitive->Camera);
        self::assertNull($this->timePrimitive);
    }
}
