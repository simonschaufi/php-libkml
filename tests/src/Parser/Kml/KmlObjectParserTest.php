<?php

namespace LibKml\Tests\Parser\Kml;

use LibKml\Domain\Feature\Placemark;
use LibKml\Domain\KmlObject;
use LibKml\Parser\Kml\KmlObjectParser;
use PHPUnit\Framework\TestCase;

class KmlObjectParserTest extends TestCase {

  /**
   * @var KmlObjectParser
   */
  protected $kmlObjectParser;
  protected $kmlElement;

  public function setUp() {
    $this->kmlObjectParser = new class extends KmlObjectParser {
      protected function buildKmlObject(): KmlObject {
        return new Placemark();
      }
    };
    $this->kmlElement = simplexml_load_string('<placemark id="id" targetId="targetId">Content</placemark>');
  }

  public function testParse() {
    $kmlObject = $this->kmlObjectParser->parse($this->kmlElement);

    $this->assertEquals("id", $kmlObject->getId());
    $this->assertEquals("targetId", $kmlObject->getTargetId());
  }

}
