<?php

namespace LibKml\Tests\Reader\Kml;

use LibKml\Reader\Kml\Feature\NetworkLinkParser;
use PHPUnit\Framework\TestCase;

class NetworkLinkParserTest extends TestCase {

  const KML_NETWORK_LINK = '
<NetworkLink id="network-link-1" targetId="target-id-1">
  <name>Open NetworkLink</name>
  <open>1</open>
  <description>NetworkLink closed to fetched content</description>
  <Link>
    <href>placemark.kml</href>
  </Link>
</NetworkLink>';

  /**
   * @var NetworkLinkParser
   */
  protected $networkLinkParser;
  protected $kmlElement;

  public function setUp() {
    $this->networkLinkParser = new NetworkLinkParser();
    $this->kmlElement = simplexml_load_string(self::KML_NETWORK_LINK);
  }

  public function testParse() {
    $kmlObject = $this->networkLinkParser->parse($this->kmlElement);

    $this->assertEquals("network-link-1", $kmlObject->getId());
    $this->assertEquals("target-id-1", $kmlObject->getTargetId());
    $this->assertEquals(TRUE, $kmlObject->getOpen());
    $this->assertEquals("Open NetworkLink", $kmlObject->getName());
    $this->assertEquals("NetworkLink closed to fetched content", $kmlObject->getDescription());
    $this->assertEquals("placemark.kml", $kmlObject->getLink()->getHref());
  }

}
