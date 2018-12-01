<?php

namespace LibKml\Tests\Domain;

use LibKml\Domain\FieldType\HttpQuery;
use LibKml\Domain\FieldType\RefreshMode;
use LibKml\Domain\FieldType\ViewRefreshMode;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\Link;
use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase {

  /**
   * @var Link
   */
  protected $link;

  public function setUp() {
    $this->link = new Link();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitLink')
      ->with($this->equalTo($this->link));

    $this->link->accept($objectVisitor);
  }

  public function testHrefField() {
    $href = "http://www.google.com";

    $this->link->setHref($href);

    $this->assertEquals($href, $this->link->getHref());
  }

  public function testRefreshModeField() {
    $refreshMode = "onInterval";

    $this->link->setRefreshMode($refreshMode);

    $this->assertEquals($refreshMode, $this->link->getRefreshMode());
  }

  public function testRefreshIntervalField() {
    $this->link->setRefreshInterval(11);

    $this->assertEquals(11, $this->link->getRefreshInterval());
  }

  public function testViewRefreshModeField() {
    $this->link->setViewRefreshMode(RefreshMode::ON_EXPIRE);

    $this->assertEquals(ViewRefreshMode::ON_REQUEST, $this->link->getViewRefreshMode());
  }

  public function testViewRefreshTimeField() {
    $this->link->setViewRefreshTime(23);

    $this->assertEquals(23, $this->link->getViewRefreshTime());
  }

  public function testViewBoundScaleField() {
    $viewBoundScale = 3.67;

    $this->link->setViewBoundScale($viewBoundScale);

    $this->assertEquals($viewBoundScale, $this->link->getViewBoundScale());
  }

  public function testViewFormatField() {
    $viewFormat = "BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]";

    $this->link->setViewFormat($viewFormat);

    $this->assertEquals($viewFormat, $this->link->getViewFormat());
  }

  public function testHttpQueryField() {
    $httpQuery = new HttpQuery();

    $this->link->setHttpQuery($httpQuery);

    $this->assertEquals($httpQuery, $this->link->getHttpQuery());
  }

}
