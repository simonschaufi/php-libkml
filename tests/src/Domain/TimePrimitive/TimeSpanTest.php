<?php

namespace LibKml\Tests\Domain\TimePrimitive;

use DateTime;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\TimePrimitive\TimeSpan;
use PHPUnit\Framework\TestCase;

class TimeSpanTest extends TestCase {

  /**
   * @var TimeSpan
   */
  protected $timeSpan;

  public function setUp() {
    $this->timeSpan = new TimeSpan();
  }

  public function testAccept() {
    $timeSpan = new TimeSpan();

    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitTimeSpan')
      ->with($this->equalTo($timeSpan));

    $timeSpan->accept($objectVisitor);
  }

  public function testBeginField() {
    $begin = time();

    $this->timeSpan->setBegin($begin);

    $this->assertEquals($begin, $this->timeSpan->getBegin());
  }

  /**
   * @throws \Exception
   */
  public function testEndField() {
    $end = time();

    $this->timeSpan->setEnd($end);

    $this->assertEquals($end, $this->timeSpan->getEnd());
  }

}
