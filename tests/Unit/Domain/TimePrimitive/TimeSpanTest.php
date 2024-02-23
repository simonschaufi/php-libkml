<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\TimePrimitive;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\TimePrimitive\TimeSpan;
use PHPUnit\Framework\TestCase;

final class TimeSpanTest extends TestCase
{
    private TimeSpan $timeSpan;

    protected function setUp(): void
    {
        $this->timeSpan = new TimeSpan();
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitTimeSpan')
          ->with(self::equalTo($this->timeSpan));

        $this->timeSpan->accept($objectVisitor);
    }

    public function testBeginField(): void
    {
        $begin = date(DATE_ATOM);

        $this->timeSpan->setBegin($begin);

        self::assertEquals($begin, $this->timeSpan->getBegin());
    }

    /**
     * @throws \Exception
     */
    public function testEndField(): void
    {
        $end = date(DATE_ATOM);

        $this->timeSpan->setEnd($end);

        self::assertEquals($end, $this->timeSpan->getEnd());
    }
}
