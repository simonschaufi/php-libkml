<?php

namespace LibKml\Tests\Domain;

use LibKml\Domain\FieldType\RefreshMode;
use LibKml\Domain\FieldType\ViewRefreshMode;
use LibKml\Domain\Icon;
use PHPUnit\Framework\TestCase;

class IconTest extends TestCase {

  protected $icon;

  public function setUp() {
    $this->icon = new Icon();
  }

  public function testHrefField() {
    $this->icon->setHref("http://www.google.com");

    $this->assertEquals("http://www.google.com", $this->icon->getHref());
  }

  public function testRefreshModeField() {
    $this->icon->setRefreshMode(RefreshMode::$ON_EXPIRE);

    $this->assertEquals(RefreshMode::$ON_EXPIRE, $this->icon->getRefreshMode());
  }

  public function testRefreshIntervalField() {
    $this->icon->setRefreshInterval(11);

    $this->assertEquals(11, $this->icon->getRefreshInterval());
  }

  public function testViewRefreshModeField() {
    $this->icon->setViewRefreshMode(RefreshMode::$ON_EXPIRE);

    $this->assertEquals(ViewRefreshMode::$ON_REQUEST, $this->icon->getViewRefreshMode());
  }

  public function testViewRefreshTimeField() {
    $this->icon->setViewRefreshTime(23);

    $this->assertEquals(23, $this->icon->getViewRefreshTime());
  }

}
