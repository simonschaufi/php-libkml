<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain;

use LibKml\Domain\FieldType\ViewRefreshMode;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\Link;
use PHPUnit\Framework\TestCase;

final class LinkTest extends TestCase
{
    private Link $link;

    protected function setUp(): void
    {
        $this->link = new Link();
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitLink')
          ->with(self::equalTo($this->link));

        $this->link->accept($objectVisitor);
    }

    public function testHrefField(): void
    {
        $href = 'https://www.google.com';

        $this->link->setHref($href);

        self::assertEquals($href, $this->link->getHref());
    }

    public function testRefreshModeField(): void
    {
        $refreshMode = 'onInterval';

        $this->link->setRefreshMode($refreshMode);

        self::assertEquals($refreshMode, $this->link->getRefreshMode());
    }

    public function testRefreshIntervalField(): void
    {
        $this->link->setRefreshInterval(11);

        self::assertEquals(11, $this->link->getRefreshInterval());
    }

    public function testViewRefreshModeField(): void
    {
        $this->link->setViewRefreshMode(ViewRefreshMode::ON_REQUEST);

        self::assertEquals(ViewRefreshMode::ON_REQUEST, $this->link->getViewRefreshMode());
    }

    public function testViewRefreshTimeField(): void
    {
        $this->link->setViewRefreshTime(23);

        self::assertEquals(23, $this->link->getViewRefreshTime());
    }

    public function testViewBoundScaleField(): void
    {
        $viewBoundScale = 3.67;

        $this->link->setViewBoundScale($viewBoundScale);

        self::assertEquals($viewBoundScale, $this->link->getViewBoundScale());
    }

    public function testViewFormatField(): void
    {
        $viewFormat = 'BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]';

        $this->link->setViewFormat($viewFormat);

        self::assertEquals($viewFormat, $this->link->getViewFormat());
    }

    public function testHttpQueryField(): void
    {
        $httpQuery = 'gv=[clientVersion]&kv=[kmlVersion]&l=[language]';

        $this->link->setHttpQuery($httpQuery);

        self::assertEquals($httpQuery, $this->link->getHttpQuery());
    }
}
