<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\TimePrimitive;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\TimePrimitive\TimeSpan;
use PHPUnit\Framework\TestCase;

final class TimeSpanTest extends TestCase
{
    /**
     * @var TimeSpan
     */
    protected $timeSpan;

    protected function setUp(): void
    {
        $this->timeSpan = new TimeSpan();
    }

    public function testAccept(): void
    {
        $timeSpan = new TimeSpan();

        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitTimeSpan')
          ->with(self::equalTo($timeSpan));

        $timeSpan->accept($objectVisitor);
    }

    public function testBeginField(): void
    {
        $begin = time();

        $this->timeSpan->setBegin($begin);

        self::assertEquals($begin, $this->timeSpan->getBegin());
    }

    /**
     * @throws \Exception
     */
    public function testEndField(): void
    {
        $end = time();

        $this->timeSpan->setEnd($end);

        self::assertEquals($end, $this->timeSpan->getEnd());
    }
}
