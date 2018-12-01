<?php

namespace LibKml\Tests\Domain\StyleSelector;

use LibKml\Domain\StyleSelector\Pair;
use LibKml\Domain\StyleSelector\Style;
use PHPUnit\Framework\TestCase;

class PairTest extends TestCase {

  /**
   * @var Pair
   */
  protected $pair;

  public function setUp() {
    $this->pair = new Pair();
  }

  public function testKeyField() {
    $key = "relativeToGround";

    $this->pair->setKey($key);

    $this->assertEquals($key, $this->pair->getKey());
  }

  public function testStyleUrlField() {
    $styleUrl = "#myDefaultStyles";

    $this->pair->setStyleUrl($styleUrl);

    $this->assertEquals($styleUrl, $this->pair->getStyleUrl());
  }

  public function testStyleField() {
    $style = new Style();

    $this->pair->setStyle($style);

    $this->assertEquals($style, $this->pair->getStyle());
  }

}
