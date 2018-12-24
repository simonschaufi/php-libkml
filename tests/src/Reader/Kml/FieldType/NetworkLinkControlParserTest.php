<?php

namespace LibKml\Tests\Reader\Kml;

use LibKml\Domain\AbstractView\AbstractView;
use LibKml\Domain\AbstractView\LookAt;
use LibKml\Reader\Kml\FieldType\NetworkLinkControlParser;
use PHPUnit\Framework\TestCase;

class NetworkLinkControlParserTest extends TestCase {

  const KML_NETWORK_LINK_CONTROL = <<<'TAG'
<NetworkLinkControl>
  <minRefreshPeriod>10.5</minRefreshPeriod>
  <maxSessionLength>30</maxSessionLength>
  <cookie>cookie=sometext</cookie>
  <message>This is a pop-up message</message>  
  <linkName>New KML features</linkName>
  <linkDescription><![CDATA[KML now has new features available!]]></linkDescription>
  <linkSnippet>Network link snippet</linkSnippet>
  <expires>60m</expires>
  <LookAt>
    <longitude>1.67</longitude>
    <latitude>15.678</latitude>
    <altitude>50</altitude>
    <heading>57.85</heading>
    <tilt>-10.5</tilt>
    <range>345.8</range>
    <altitudeMode>absolute</altitudeMode>
  </LookAt>
</NetworkLinkControl>
TAG;

  protected $networkLinkControl;

  public function setUp() {
    $xml = simplexml_load_string(self::KML_NETWORK_LINK_CONTROL);

    $this->networkLinkControl = NetworkLinkControlParser::parse($xml);
  }

  public function testParseMinRefreshPeriod() {
    $this->assertEquals(10.5, $this->networkLinkControl->getMinRefreshPeriod());
  }

  public function testParseMaxSessionLength() {
    $this->assertEquals(30, $this->networkLinkControl->getMaxSessionLength());
  }

  public function testParseCookie() {
    $this->assertEquals('cookie=sometext', $this->networkLinkControl->getCookie());
  }

  public function testParseMessage() {
    $this->assertEquals('This is a pop-up message', $this->networkLinkControl->getMessage());
  }

  public function testParseLinkName() {
    $this->assertEquals('New KML features', $this->networkLinkControl->getLinkName());
  }

  public function testParseLinkDescription() {
    $this->assertEquals('KML now has new features available!', $this->networkLinkControl->getLinkDescription());
  }

  public function testParseLinkSnippet() {
    $this->assertEquals('Network link snippet', $this->networkLinkControl->getLinkSnippet());
  }

  public function testParseExpires() {
    $this->assertEquals('60m', $this->networkLinkControl->getExpires());
  }

  public function testParseAbstractView() {
    $this->assertInstanceOf(AbstractView::class, $this->networkLinkControl->getAbstractView());
  }

}
