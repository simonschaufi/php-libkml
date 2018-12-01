<?php

namespace LibKml\Tests\Domain;

use LibKml\Domain\Feature\Placemark;
use LibKml\Domain\Update;
use PHPUnit\Framework\TestCase;

class UpdateTest extends TestCase {

  /**
   * @var Update
   */
  protected $update;

  public function setUp() {
    $this->update = new Update();
  }

  public function testTargetHrefField() {
    $targetHref = "http://www.google.com";

    $this->update->setTargetHref($targetHref);

    $this->assertEquals($targetHref, $this->update->getTargetHref());
  }

  public function testChangeField() {
    $change1 = new Placemark();
    $change2 = new Placemark();
    $changes = [$change1, $change2];

    $this->update->setChange($changes);

    $this->assertCount(count($changes), $this->update->getChange());
    $this->assertContains($change1, $this->update->getChange());
    $this->assertContains($change2, $this->update->getChange());
  }

  public function testCreateField() {
    $create1 = new Placemark();
    $create2 = new Placemark();
    $creates = [$create1, $create2];

    $this->update->setCreate($creates);

    $this->assertCount(count($creates), $this->update->getCreate());
    $this->assertContains($create1, $this->update->getCreate());
    $this->assertContains($create2, $this->update->getCreate());
  }

  public function testDeleteField() {
    $delete1 = new Placemark();
    $delete2 = new Placemark();
    $deletes = [$delete1, $delete2];

    $this->update->setDelete($deletes);

    $this->assertCount(count($deletes), $this->update->getDelete());
    $this->assertContains($delete1, $this->update->getDelete());
    $this->assertContains($delete2, $this->update->getDelete());
  }
}
