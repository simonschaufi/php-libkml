<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\TimePrimitive;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\TimePrimitive\TimeStamp;
use PHPUnit\Framework\TestCase;

final class TimeStampTest extends TestCase
{
    /**
     * @var TimeStamp
     */
    protected $timeStamp;

    protected function setUp(): void
    {
        $this->timeStamp = new TimeStamp();
    }

    public function testAccept(): void
    {
        $timeStamp = new TimeStamp();

        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitTimeStamp')
          ->with(self::equalTo($timeStamp));

        $timeStamp->accept($objectVisitor);
    }

    public function testWhenField(): void
    {
        $when = time();

        $this->timeStamp->setWhen($when);

        self::assertEquals($when, $this->timeStamp->getWhen());
    }
}
