<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\FieldType;

use LibKml\Domain\AbstractView\AbstractView;
use LibKml\Domain\FieldType\NetworkLinkControl;
use LibKml\Reader\Kml\FieldType\NetworkLinkControlParser;
use PHPUnit\Framework\TestCase;

final class NetworkLinkControlParserTest extends TestCase
{
    private const KML_NETWORK_LINK_CONTROL = <<<'TAG'
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

    private NetworkLinkControl $networkLinkControl;

    protected function setUp(): void
    {
        $xml = simplexml_load_string(self::KML_NETWORK_LINK_CONTROL);

        $this->networkLinkControl = NetworkLinkControlParser::parse($xml);
    }

    public function testParseMinRefreshPeriod(): void
    {
        self::assertEquals(10.5, $this->networkLinkControl->getMinRefreshPeriod());
    }

    public function testParseMaxSessionLength(): void
    {
        self::assertEquals(30, $this->networkLinkControl->getMaxSessionLength());
    }

    public function testParseCookie(): void
    {
        self::assertEquals('cookie=sometext', $this->networkLinkControl->getCookie());
    }

    public function testParseMessage(): void
    {
        self::assertEquals('This is a pop-up message', $this->networkLinkControl->getMessage());
    }

    public function testParseLinkName(): void
    {
        self::assertEquals('New KML features', $this->networkLinkControl->getLinkName());
    }

    public function testParseLinkDescription(): void
    {
        self::assertEquals('KML now has new features available!', $this->networkLinkControl->getLinkDescription());
    }

    public function testParseLinkSnippet(): void
    {
        self::assertEquals('Network link snippet', $this->networkLinkControl->getLinkSnippet());
    }

    public function testParseExpires(): void
    {
        self::assertEquals('60m', $this->networkLinkControl->getExpires());
    }

    public function testParseAbstractView(): void
    {
        self::assertInstanceOf(AbstractView::class, $this->networkLinkControl->getAbstractView());
    }
}
