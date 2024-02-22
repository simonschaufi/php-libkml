<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\AbstractView;

use LibKml\Domain\AbstractView\LookAt;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\AbstractView\LookAtParser;
use PHPUnit\Framework\TestCase;

final class LookAtParserTest extends TestCase
{
    private const KML_LOOK_AT = <<<'TAG'
<LookAt>
  <longitude>-119.748584</longitude>
  <latitude>33.736266</latitude>
  <altitude>90</altitude>
  <heading>-9.295926</heading>
  <tilt>84.0957450</tilt>
  <range>4469.850414</range>
</LookAt>
TAG;

    private LookAtParser $lookAtParser;

    /**
     * @var LookAt
     */
    private KmlObject $lookAt;

    protected function setUp(): void
    {
        $this->lookAtParser = new LookAtParser();

        $xmlElement = simplexml_load_string(self::KML_LOOK_AT);

        $this->lookAt = $this->lookAtParser->parse($xmlElement);
    }

    public function testParseLongitude(): void
    {
        self::assertEquals(-119.748584, $this->lookAt->getLongitude());
    }

    public function testParseLatitude(): void
    {
        self::assertEquals(33.736266, $this->lookAt->getLatitude());
    }

    public function testParseAltitude(): void
    {
        self::assertEquals(90, $this->lookAt->getAltitude());
    }

    public function testParseHeading(): void
    {
        self::assertEquals(-9.295926, $this->lookAt->getHeading());
    }

    public function testParseTilt(): void
    {
        self::assertEquals(84.0957450, $this->lookAt->getTilt());
    }

    public function testParseRange(): void
    {
        self::assertEquals(4469.850414, $this->lookAt->getRange());
    }
}
