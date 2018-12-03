<?php

namespace LibKml\Tests;

use LibKml\Domain\Feature\Feature;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\NetworkLinkControl;
use LibKml\KmlDocument;
use PHPUnit\Framework\TestCase;

class KmlDocumentTest extends TestCase {

  /**
   * @var KmlDocument
   */
  protected $kmlDocument;

  public function setUp() {
    $this->kmlDocument = new KmlDocument();
  }

  public function testHintField() {
    $hint = "target=sky";

    $this->kmlDocument->setHint($hint);

    $this->assertEquals($hint, $this->kmlDocument->getHint());
  }

  public function testNetworkLinkControlField() {
    $networkLinkControl = new NetworkLinkControl();

    $this->kmlDocument->setNetworkLinkControl($networkLinkControl);

    $this->assertEquals($networkLinkControl, $this->kmlDocument->getNetworkLinkControl());
  }

  public function testFeatureField() {
    $feature = new class extends Feature {
      public function accept(KmlObjectVisitorInterface $visitor): void {
      }
    };

    $this->kmlDocument->setFeature($feature);

    $this->assertEquals($feature, $this->kmlDocument->getFeature());
  }
}
