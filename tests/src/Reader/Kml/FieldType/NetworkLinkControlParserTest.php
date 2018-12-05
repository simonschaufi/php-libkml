<?php

namespace LibKml\Tests\Reader\Kml;

use LibKml\Reader\Kml\FieldType\NetworkLinkControlParser;
use PHPUnit\Framework\TestCase;

class NetworkLinkControlParserTest extends TestCase {

  const KML_NETWORK_LINK_CONTROL = <<<'TAG'
<NetworkLinkControl>
   <message>This is a pop-up message</message>
   <cookie>cookie=sometext</cookie>
   <linkName>New KML features</linkName>
   <linkDescription><![CDATA[KML now has new features available!]]></linkDescription>
</NetworkLinkControl>
TAG;


  public function testParse() {
    $xml = simplexml_load_string(self::KML_NETWORK_LINK_CONTROL);

    $networkLinkControl = NetworkLinkControlParser::parse($xml);

    $this->assertEquals('This is a pop-up message', $networkLinkControl->getMessage());
    $this->assertEquals('cookie=sometext', $networkLinkControl->getCookie());
    $this->assertEquals('New KML features', $networkLinkControl->getLinkName());
    $this->assertEquals('KML now has new features available!', $networkLinkControl->getLinkDescription());
  }

}
