<?php

namespace LibKml\Tests\Domain\Feature\ExtendedOther;

use LibKml\Domain\Feature\ExtendedData\Other;
use PHPUnit\Framework\TestCase;

class OtherTest extends TestCase {

  /**
   * @var Other
   */
  protected $other;

  public function setUp() {
    $this->other = new Other();
  }

  public function testNameField() {
    $name = "number";

    $this->other->setName($name);

    $this->assertEquals($name, $this->other->getName());
  }

  public function testValueField() {
    $value = "14";

    $this->other->setValue($value);

    $this->assertEquals($value, $this->other->getValue());
  }

  public function testNamespaceField() {
    $namespace = "camp";

    $this->other->setNamespace($namespace);

    $this->assertEquals($namespace, $this->other->getNamespace());
  }
}
