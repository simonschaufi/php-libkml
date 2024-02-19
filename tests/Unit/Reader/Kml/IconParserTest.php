<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml;

use LibKml\Domain\FieldType\RefreshMode;
use LibKml\Domain\FieldType\ViewRefreshMode;
use LibKml\Domain\Icon;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\IconParser;
use PHPUnit\Framework\TestCase;

final class IconParserTest extends TestCase
{
    private const KML_ICON = <<<'TAG'
<Icon>
  <href>Sunset.jpg</href>
  <refreshMode>onInterval</refreshMode>
  <refreshInterval>10</refreshInterval>
  <viewRefreshMode>onRequest</viewRefreshMode>
  <viewRefreshTime>30</viewRefreshTime>
  <viewBoundScale>3</viewBoundScale>
  <viewFormat>BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]</viewFormat>
  <httpQuery>gv=[clientVersion]</httpQuery>
</Icon>
TAG;

    private IconParser $iconParser;

    /**
     * @var Icon
     */
    private KmlObject $icon;

    protected function setUp(): void
    {
        $this->iconParser = new IconParser();
        $kml = simplexml_load_string(self::KML_ICON);
        $this->icon = $this->iconParser->parse($kml);
    }

    public function testParseIcon(): void
    {
        self::assertInstanceOf(Icon::class, $this->icon);
    }

    public function testParseHref(): void
    {
        self::assertEquals('Sunset.jpg', $this->icon->getHref());
    }

    public function testParseRefreshMode(): void
    {
        self::assertEquals(RefreshMode::ON_INTERVAL, $this->icon->getRefreshMode());
    }

    public function testParseRefreshInterval(): void
    {
        self::assertEquals(10, $this->icon->getRefreshInterval());
    }

    public function testParseViewRefreshMode(): void
    {
        self::assertEquals(ViewRefreshMode::ON_REQUEST, $this->icon->getViewRefreshMode());
    }

    public function testParseViewRefreshTime(): void
    {
        self::assertEquals(30, $this->icon->getViewRefreshTime());
    }

    public function testParseViewBoundScale(): void
    {
        self::assertEquals(3, $this->icon->getViewBoundScale());
    }

    public function testParseViewFormat(): void
    {
        self::assertEquals('BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]', $this->icon->getViewFormat());
    }

    public function testParseHttpQuery(): void
    {
        self::assertEquals('gv=[clientVersion]', $this->icon->getHttpQuery());
    }
}
