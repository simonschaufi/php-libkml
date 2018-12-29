<?php

namespace LibKml\Tests\Domain\TimePrimitive;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\TimePrimitive\TimeStamp;
use PHPUnit\Framework\TestCase;

class TimeStampTest extends TestCase {

  /**
   * @var TimeStamp
   */
  protected $timeStamp;

  public function setUp() {
    $this->timeStamp = new TimeStamp();
  }

  public function testAccept() {
    $timeStamp = new TimeStamp();

    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitTimeStamp')
      ->with($this->equalTo($timeStamp));

    $timeStamp->accept($objectVisitor);
  }


  public function testWhenField() {
    $when = date(DATE_ATOM);

    $this->timeStamp->setWhen($when);

    $this->assertEquals($when, $this->timeStamp->getWhen());
  }

  public function testFromInteger() {
    $unixTimestamp = time();

    $timeStamp = TimeStamp::fromInteger($unixTimestamp);

    $this->assertEquals(date(DATE_ISO8601, $unixTimestamp), $timeStamp->getWhen());
  }
  
}
