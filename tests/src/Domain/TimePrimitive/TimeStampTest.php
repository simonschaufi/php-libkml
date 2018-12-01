<?php

namespace LibKml\Tests\Domain\TimePrimitive;

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

  public function testWhenField() {
    $when = time();

    $this->timeStamp->setWhen($when);

    $this->assertEquals($when, $this->timeStamp->getWhen());
  }
  
}
