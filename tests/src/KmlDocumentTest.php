<?php

namespace LibKML\Tests;

use LibKML\Domain\Feature\Placemark;
use LibKML\Domain\Geometry\Polygon;
use LibKml\KmlDocument;
use PHPUnit\Framework\TestCase;

class KmlDocumentTest extends TestCase {

  protected $kmlDocument;

  public function setUp() {
    $this->kmlDocument = new KmlDocument();
  }

  public function testAddElement() {
    $placemark = new Placemark();
    $initialElements = count($this->kmlDocument->getElements());

    $this->kmlDocument->addElement($placemark);

    $this->assertContains($placemark, $this->kmlDocument->getElements());
    $this->assertCount($initialElements + 1, $this->kmlDocument->getElements());
  }

  public function testElementsField() {
    $placemark = new Placemark();
    $polygon = new Polygon();

    $this->kmlDocument->setElements(array($placemark, $polygon));

    $this->assertContains($placemark, $this->kmlDocument->getElements());
    $this->assertContains($polygon, $this->kmlDocument->getElements());
    $this->assertCount(2, $this->kmlDocument->getElements());
  }

}
