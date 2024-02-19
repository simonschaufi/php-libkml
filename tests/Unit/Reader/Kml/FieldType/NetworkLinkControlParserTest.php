<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\FieldType;

use LibKml\Reader\Kml\FieldType\NetworkLinkControlParser;
use PHPUnit\Framework\TestCase;

final class NetworkLinkControlParserTest extends TestCase
{
    public const KML_NETWORK_LINK_CONTROL = <<<'TAG'
<NetworkLinkControl>
   <message>This is a pop-up message</message>
   <cookie>cookie=sometext</cookie>
   <linkName>New KML features</linkName>
   <linkDescription><![CDATA[KML now has new features available!]]></linkDescription>
</NetworkLinkControl>
TAG;

    public function testParse(): void
    {
        $xml = simplexml_load_string(self::KML_NETWORK_LINK_CONTROL);

        $networkLinkControl = NetworkLinkControlParser::parse($xml);

        self::assertEquals('This is a pop-up message', $networkLinkControl->getMessage());
        self::assertEquals('cookie=sometext', $networkLinkControl->getCookie());
        self::assertEquals('New KML features', $networkLinkControl->getLinkName());
        self::assertEquals('KML now has new features available!', $networkLinkControl->getLinkDescription());
    }
}
