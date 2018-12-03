<?php

namespace LibKml\Tests;

use LibKml\KmlBuilder;
use LibKml\KmlDocument;
use PHPUnit\Framework\TestCase;

class KmlBuilderTest extends TestCase {

  /**
   * @var KmlBuilder
   */
  protected $kmlBuilder;

  public function setUp() {
    $this->kmlBuilder = new KmlBuilder();
  }

  public function testBuild() {
    $kmlDocument = $this->kmlBuilder->build();

    $this->assertInstanceOf(KmlDocument::class, $kmlDocument);
    $this->assertNull($kmlDocument->getHint());
    $this->assertNull($kmlDocument->getFeature());
  }

}
