<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Feature;

use LibKml\Reader\Kml\Feature\NetworkLinkParser;
use PHPUnit\Framework\TestCase;

final class NetworkLinkParserTest extends TestCase
{
    public const KML_NETWORK_LINK = <<<'TAG'
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

    protected function setUp(): void
    {
        $this->networkLinkParser = new NetworkLinkParser();
        $this->kmlElement = simplexml_load_string(self::KML_NETWORK_LINK);
    }

    public function testParse(): void
    {
        $kmlObject = $this->networkLinkParser->parse($this->kmlElement);

        self::assertEquals('network-link-1', $kmlObject->getId());
        self::assertEquals('target-id-1', $kmlObject->getTargetId());
        self::assertTrue($kmlObject->getOpen());
        self::assertEquals('Open NetworkLink', $kmlObject->getName());
        self::assertEquals('NetworkLink closed to fetched content', $kmlObject->getDescription());
        self::assertEquals('placemark.kml', $kmlObject->getLink()->getHref());
    }
}
