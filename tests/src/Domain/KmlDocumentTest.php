<?php

namespace LibKml\Tests\Domain;

use LibKml\Domain\Feature\Feature;
use LibKml\Domain\FieldType\NetworkLinkControl;
use LibKml\Domain\KmlDocument;
use LibKml\Domain\KmlObjectVisitorInterface;

use PHPUnit\Framework\TestCase;

class KmlDocumentTest extends TestCase {

  /**
   * @var KmlDocument
   */
  protected $kmlDocument;

  public function setUp() {
    $this->kmlDocument = new KmlDocument();
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
