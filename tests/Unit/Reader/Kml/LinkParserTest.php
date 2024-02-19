<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml;

use LibKml\Domain\Link;
use LibKml\Reader\Kml\LinkParser;
use PHPUnit\Framework\TestCase;

final class LinkParserTest extends TestCase
{
    public const KML_LINK = <<<'TAG'
<Link>
  <href>http://www.example.com/geotiff/NE/MergedReflectivityQComposite.kml</href>
  <refreshMode>onInterval</refreshMode>
  <refreshInterval>30</refreshInterval>
  <viewRefreshMode>onStop</viewRefreshMode>
  <viewRefreshTime>7</viewRefreshTime>
  <viewFormat>BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]</viewFormat>
</Link>
TAG;

    protected LinkParser $linkParser;

    protected function setUp(): void
    {
        $this->linkParser = new LinkParser();
    }

    public function testParse(): void
    {
        $kml = simplexml_load_string(self::KML_LINK);

        $kmlObject = $this->linkParser->parse($kml);

        self::assertInstanceOf(Link::class, $kmlObject);
        self::assertEquals('http://www.example.com/geotiff/NE/MergedReflectivityQComposite.kml', $kmlObject->getHref());
        self::assertEquals('onInterval', $kmlObject->getRefreshMode());
        self::assertEquals('30', $kmlObject->getRefreshInterval());
        self::assertEquals('onStop', $kmlObject->getViewRefreshMode());
        self::assertEquals('7', $kmlObject->getViewRefreshTime());
        self::assertEquals('BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]', $kmlObject->getViewFormat());
    }
}
