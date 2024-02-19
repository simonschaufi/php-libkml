<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\AbstractView;

use LibKml\Domain\AbstractView\LookAt;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class LookAtTest extends TestCase
{
    private LookAt $lookAt;

    protected function setUp(): void
    {
        $this->lookAt = new LookAt();
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitLookAt')
          ->with(self::equalTo($this->lookAt));

        $this->lookAt->accept($objectVisitor);
    }

    public function testDefaultValues(): void
    {
        self::assertEquals(0, $this->lookAt->getRange());
    }

    public function testRangeField(): void
    {
        $range = 1234.45;

        $this->lookAt->setRange($range);

        self::assertEquals($range, $this->lookAt->getRange());
    }
}
