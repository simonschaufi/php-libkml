<?php

namespace LibKml\Tests\Reader\Kml;

use LibKml\Reader\Kml\Feature\NetworkLinkParser;
use PHPUnit\Framework\TestCase;

class NetworkLinkParserTest extends TestCase {

  const KML_NETWORK_LINK = <<<'TAG'
<NetworkLink id="network-link-1" targetId="target-id-1">
  <name>Open NetworkLink</name>
  <open>1</open>
  <description>NetworkLink closed to fetched content</description>
  <Link>
    <href>placemark.kml</href>
  </Link>
</NetworkLink>
TAG;

  /**
   * @var NetworkLinkParser
   */
  protected $networkLinkParser;

  protected $kmlElement;

  /**
   * @var NetworkLink
   */
  protected $networkLink;

  public function setUp() {
    $this->networkLinkParser = new NetworkLinkParser();
    $this->kmlElement = simplexml_load_string(self::KML_NETWORK_LINK);
    $this->networkLink = $this->networkLinkParser->parse($this->kmlElement);
  }

  public function testParseId() {
    $this->assertEquals("network-link-1", $this->networkLink->getId());
  }

  public function testParseTargetId() {
    $this->assertEquals("target-id-1", $this->networkLink->getTargetId());
  }

  public function testParseOpen() {
    $this->assertEquals(TRUE, $this->networkLink->getOpen());
  }

  public function testParseName() {
    $this->assertEquals("Open NetworkLink", $this->networkLink->getName());
  }

  public function testParseDescription() {
    $this->assertEquals("NetworkLink closed to fetched content", $this->networkLink->getDescription());
  }

  public function testParseLink() {
    $this->assertEquals("placemark.kml", $this->networkLink->getLink()->getHref());
  }

}
