<?php

namespace LibKml\Tests;

use LibKml\KmlBuilder;
use LibKml\KmlDocument;
use PHPUnit\Framework\TestCase;

class KmlBuilderTest extends TestCase {

  public function testBuild() {
    $kmlDocument = KmlBuilder::build();

    $this->assertInstanceOf(KmlDocument::class, $kmlDocument);
    $this->assertEmpty($kmlDocument->getElements());
  }

}
