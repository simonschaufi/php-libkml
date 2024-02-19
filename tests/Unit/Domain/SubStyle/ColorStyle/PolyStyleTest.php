<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\SubStyle\ColorStyle;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\ColorStyle\PolyStyle;
use PHPUnit\Framework\TestCase;

final class PolyStyleTest extends TestCase
{
    /**
     * @var PolyStyle
     */
    protected $polyStyle;

    protected function setUp(): void
    {
        $this->polyStyle = new PolyStyle();
    }

    public function testAccept(): void
    {
        $timeStamp = new PolyStyle();

        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitPolyStyle')
          ->with(self::equalTo($timeStamp));

        $timeStamp->accept($objectVisitor);
    }

    public function testFillField(): void
    {
        $fill = true;

        $this->polyStyle->setFill($fill);

        self::assertEquals($fill, $this->polyStyle->getFill());
    }

    public function testOutlineField(): void
    {
        $outline = true;

        $this->polyStyle->setOutline($outline);

        self::assertEquals($outline, $this->polyStyle->getOutline());
    }
}
