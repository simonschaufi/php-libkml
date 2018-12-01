<?php

namespace LibKml\Tests\Domain\TimePrimitive;

use DateTime;
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
