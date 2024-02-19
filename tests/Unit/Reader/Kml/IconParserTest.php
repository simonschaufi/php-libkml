<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml;

use LibKml\Domain\FieldType\RefreshMode;
use LibKml\Domain\FieldType\ViewRefreshMode;
use LibKml\Domain\Icon;
use LibKml\Reader\Kml\IconParser;
use PHPUnit\Framework\TestCase;

final class IconParserTest extends TestCase
{
    public const KML_ICON = <<<'TAG'
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

    /**
     * @var IconParser
     */
    protected $iconParser;

    protected function setUp(): void
    {
        $this->iconParser = new IconParser();
    }

    public function testParse(): void
    {
        $kml = simplexml_load_string(self::KML_ICON);

        $kmlObject = $this->iconParser->parse($kml);

        self::assertInstanceOf(Icon::class, $kmlObject);
        self::assertEquals('Sunset.jpg', $kmlObject->getHref());
        self::assertEquals(RefreshMode::ON_INTERVAL, $kmlObject->getRefreshMode());
        self::assertEquals(10, $kmlObject->getRefreshInterval());
        self::assertEquals(ViewRefreshMode::ON_REQUEST, $kmlObject->getViewRefreshMode());
        self::assertEquals(30, $kmlObject->getViewRefreshTime());
        self::assertEquals(3, $kmlObject->getViewBoundScale());
        self::assertEquals('BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]', $kmlObject->getViewFormat());
        self::assertEquals('gv=[clientVersion]', $kmlObject->getHttpQuery());
    }
}
