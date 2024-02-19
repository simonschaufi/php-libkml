<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\SubStyle\ColorStyle;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\ColorStyle\LabelStyle;
use PHPUnit\Framework\TestCase;

final class LabelStyleTest extends TestCase
{
    /**
     * @var LabelStyle
     */
    protected $labelStyle;

    protected function setUp(): void
    {
        $this->labelStyle = new LabelStyle();
    }

    public function testScaleField(): void
    {
        $scale = 3.75;

        $this->labelStyle->setScale($scale);

        self::assertEquals($scale, $this->labelStyle->getScale());
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitLabelStyle')
          ->with(self::equalTo($this->labelStyle));

        $this->labelStyle->accept($objectVisitor);
    }
}
