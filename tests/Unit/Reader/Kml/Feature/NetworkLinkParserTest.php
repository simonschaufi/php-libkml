<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Feature;

use LibKml\Domain\Feature\NetworkLink;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\Feature\NetworkLinkParser;
use PHPUnit\Framework\TestCase;

final class NetworkLinkParserTest extends TestCase
{
    private const KML_NETWORK_LINK = <<<'TAG'
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
     * @var NetworkLink
     */
    private KmlObject $networkLink;

    protected function setUp(): void
    {
        $networkLinkParser = new NetworkLinkParser();
        $this->networkLink = $networkLinkParser->parse(simplexml_load_string(self::KML_NETWORK_LINK));
    }

    public function testParseId(): void
    {
        self::assertEquals('network-link-1', $this->networkLink->getId());
    }

    public function testParseTargetId(): void
    {
        self::assertEquals('target-id-1', $this->networkLink->getTargetId());
    }

    public function testParseOpen(): void
    {
        self::assertTrue($this->networkLink->getOpen());
    }

    public function testParseName(): void
    {
        self::assertEquals('Open NetworkLink', $this->networkLink->getName());
    }

    public function testParseDescription(): void
    {
        self::assertEquals('NetworkLink closed to fetched content', $this->networkLink->getDescription());
    }

    public function testParseLink(): void
    {
        self::assertEquals('placemark.kml', $this->networkLink->getLink()->getHref());
    }
}
