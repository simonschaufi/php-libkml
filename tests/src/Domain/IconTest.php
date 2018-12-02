<?php

namespace LibKml\Tests\Domain;

use LibKml\Domain\FieldType\RefreshMode;
use LibKml\Domain\FieldType\ViewRefreshMode;
use LibKml\Domain\Icon;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class IconTest extends TestCase {

  /**
   * @var Icon
   */
  protected $icon;

  public function setUp() {
    $this->icon = new Icon();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitIcon')
      ->with($this->equalTo($this->icon));

    $this->icon->accept($objectVisitor);
  }

  public function testHrefField() {
    $this->icon->setHref("http://www.google.com");

    $this->assertEquals("http://www.google.com", $this->icon->getHref());
  }

  public function testRefreshModeField() {
    $this->icon->setRefreshMode(RefreshMode::ON_EXPIRE);

    $this->assertEquals(RefreshMode::ON_EXPIRE, $this->icon->getRefreshMode());
  }

  public function testRefreshIntervalField() {
    $this->icon->setRefreshInterval(11);

    $this->assertEquals(11, $this->icon->getRefreshInterval());
  }

  public function testViewRefreshModeField() {
    $this->icon->setViewRefreshMode(ViewRefreshMode::ON_REQUEST);

    $this->assertEquals(ViewRefreshMode::ON_REQUEST, $this->icon->getViewRefreshMode());
  }

  public function testViewRefreshTimeField() {
    $this->icon->setViewRefreshTime(23);

    $this->assertEquals(23, $this->icon->getViewRefreshTime());
  }

  public function testViewBoundScaleField() {
    $viewBoundScale = 3.67;

    $this->icon->setViewBoundScale($viewBoundScale);

    $this->assertEquals($viewBoundScale, $this->icon->getViewBoundScale());
  }

  public function testViewFormatField() {
    $viewFormat = "BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]";

    $this->icon->setViewFormat($viewFormat);

    $this->assertEquals($viewFormat, $this->icon->getViewFormat());
  }

  public function testHttpQueryField() {
    $httpQuery = "gv=[clientVersion]&kv=[kmlVersion]&l=[language]";

    $this->icon->setHttpQuery($httpQuery);

    $this->assertEquals($httpQuery, $this->icon->getHttpQuery());
  }

}
