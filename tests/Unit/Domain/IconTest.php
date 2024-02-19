<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain;

use LibKml\Domain\FieldType\RefreshMode;
use LibKml\Domain\FieldType\ViewRefreshMode;
use LibKml\Domain\Icon;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class IconTest extends TestCase
{
    protected Icon $icon;

    protected function setUp(): void
    {
        $this->icon = new Icon();
    }

    public function testDefaultValues(): void
    {
        self::assertEmpty($this->icon->getHref());
        self::assertEquals(RefreshMode::ON_CHANGE, $this->icon->getRefreshMode());
        self::assertEquals(4, $this->icon->getRefreshInterval());
        self::assertEquals(ViewRefreshMode::NEVER, $this->icon->getViewRefreshMode());
        self::assertEquals(4, $this->icon->getViewRefreshTime());
        self::assertEquals(1, $this->icon->getViewBoundScale());
        self::assertEmpty($this->icon->getViewFormat());
        self::assertEmpty($this->icon->getHttpQuery());
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitIcon')
          ->with(self::equalTo($this->icon));

        $this->icon->accept($objectVisitor);
    }

    public function testHrefField(): void
    {
        $this->icon->setHref('http://www.google.com');

        self::assertEquals('http://www.google.com', $this->icon->getHref());
    }

    public function testRefreshModeField(): void
    {
        $this->icon->setRefreshMode(RefreshMode::ON_EXPIRE);

        self::assertEquals(RefreshMode::ON_EXPIRE, $this->icon->getRefreshMode());
    }

    public function testRefreshIntervalField(): void
    {
        $this->icon->setRefreshInterval(11);

        self::assertEquals(11, $this->icon->getRefreshInterval());
    }

    public function testViewRefreshModeField(): void
    {
        $this->icon->setViewRefreshMode(ViewRefreshMode::ON_REQUEST);

        self::assertEquals(ViewRefreshMode::ON_REQUEST, $this->icon->getViewRefreshMode());
    }

    public function testViewRefreshTimeField(): void
    {
        $this->icon->setViewRefreshTime(23);

        self::assertEquals(23, $this->icon->getViewRefreshTime());
    }

    public function testViewBoundScaleField(): void
    {
        $viewBoundScale = 3.67;

        $this->icon->setViewBoundScale($viewBoundScale);

        self::assertEquals($viewBoundScale, $this->icon->getViewBoundScale());
    }

    public function testViewFormatField(): void
    {
        $viewFormat = 'BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]';

        $this->icon->setViewFormat($viewFormat);

        self::assertEquals($viewFormat, $this->icon->getViewFormat());
    }

    public function testHttpQueryField(): void
    {
        $httpQuery = 'gv=[clientVersion]&kv=[kmlVersion]&l=[language]';

        $this->icon->setHttpQuery($httpQuery);

        self::assertEquals($httpQuery, $this->icon->getHttpQuery());
    }
}
