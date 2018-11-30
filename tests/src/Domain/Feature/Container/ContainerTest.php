<?php

namespace LibKml\Tests\Domain\Feature\Container;

use LibKml\Domain\Feature\Container\Container;
use LibKml\Domain\Feature\Feature;
use LibKml\Domain\Feature\Placemark;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase {

  /**
   * @var Container
   */
  protected $container;

  protected $placemark1;
  protected $placemark2;
  protected $features;

  public function setUp() {
    $this->container = new class extends Container {
      public function accept(KmlObjectVisitorInterface $visitor): void {
      }
    };
    $this->placemark1 = new Placemark();
    $this->placemark2 = new Placemark();
    $this->features = [$this->placemark1, $this->placemark2];
  }

  public function testFeaturesField() {
    $this->container->setFeatures($this->features);

    $this->assertCount(2, $this->container->getFeatures());
    $this->assertContains($this->placemark1, $this->container->getFeatures());
    $this->assertContains($this->placemark2, $this->container->getFeatures());
  }

  public function testAddFeature() {
    $this->container->addFeature($this->placemark1);

    $this->assertCount(1, $this->container->getFeatures());
    $this->assertContains($this->placemark1, $this->container->getFeatures());
  }

  public function testClearFeatures() {
    $this->container->setFeatures($this->features);

    $this->container->clearFeatures();

    $this->assertCount(0, $this->container->getFeatures());
  }

}
