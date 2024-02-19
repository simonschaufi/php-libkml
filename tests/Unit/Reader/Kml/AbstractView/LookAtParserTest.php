<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\AbstractView;

use LibKml\Reader\Kml\AbstractView\LookAtParser;
use PHPUnit\Framework\TestCase;

final class LookAtParserTest extends TestCase
{
    public const KML_LOOK_AT = <<<'TAG'
<LookAt>
  <longitude>-119.748584</longitude>
  <latitude>33.736266</latitude>
  <altitude>90</altitude>
  <heading>-9.295926</heading>
  <tilt>84.0957450</tilt>
  <range>4469.850414</range>
</LookAt>
TAG;

    /**
     * @var LookAtParser
     */
    protected $lookAtParser;

    protected function setUp(): void
    {
        $this->lookAtParser = new LookAtParser();
    }

    public function testParse(): void
    {
        $xmlElement = simplexml_load_string(self::KML_LOOK_AT);

        $lookAt = $this->lookAtParser->parse($xmlElement);

        self::assertEquals(-119.748584, $lookAt->getLongitude());
        self::assertEquals(33.736266, $lookAt->getLatitude());
        self::assertEquals(90, $lookAt->getAltitude());
        self::assertEquals(-9.295926, $lookAt->getHeading());
        self::assertEquals(84.0957450, $lookAt->getTilt());
        self::assertEquals(4469.850414, $lookAt->getRange());
    }
}
