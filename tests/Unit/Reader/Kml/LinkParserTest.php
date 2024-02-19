<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml;

use LibKml\Domain\KmlObject;
use LibKml\Domain\Link;
use LibKml\Reader\Kml\LinkParser;
use PHPUnit\Framework\TestCase;

final class LinkParserTest extends TestCase
{
    private const KML_LINK = <<<'TAG'
<Link>
  <href>http://www.example.com/geotiff/NE/MergedReflectivityQComposite.kml</href>
  <refreshMode>onInterval</refreshMode>
  <refreshInterval>30</refreshInterval>
  <viewRefreshMode>onStop</viewRefreshMode>
  <viewRefreshTime>7</viewRefreshTime>
  <viewFormat>BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]</viewFormat>
</Link>
TAG;

    private LinkParser $linkParser;

    /**
     * @var Link
     */
    private KmlObject $link;

    protected function setUp(): void
    {
        $this->linkParser = new LinkParser();
        $kml = simplexml_load_string(self::KML_LINK);
        $this->link = $this->linkParser->parse($kml);
    }

    public function testParseLink(): void
    {
        self::assertInstanceOf(Link::class, $this->link);
    }

    public function testParseHref(): void
    {
        self::assertEquals('http://www.example.com/geotiff/NE/MergedReflectivityQComposite.kml', $this->link->getHref());
    }

    public function testParseRefreshMode(): void
    {
        self::assertEquals('onInterval', $this->link->getRefreshMode());
    }

    public function testParseRefreshInterval(): void
    {
        self::assertEquals('30', $this->link->getRefreshInterval());
    }

    public function testParseViewRefreshMode(): void
    {
        self::assertEquals('onStop', $this->link->getViewRefreshMode());
    }

    public function testParseViewRefreshTime(): void
    {
        self::assertEquals('7', $this->link->getViewRefreshTime());
    }

    public function testParseViewFormat(): void
    {
        self::assertEquals('BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]', $this->link->getViewFormat());
    }
}
