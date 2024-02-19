<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\StyleSelector;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\StyleSelector\Style;
use LibKml\Domain\SubStyle\BalloonStyle;
use LibKml\Domain\SubStyle\ColorStyle\IconStyle;
use LibKml\Domain\SubStyle\ColorStyle\LabelStyle;
use LibKml\Domain\SubStyle\ColorStyle\LineStyle;
use LibKml\Domain\SubStyle\ColorStyle\PolyStyle;
use LibKml\Domain\SubStyle\ListStyle;
use PHPUnit\Framework\TestCase;

final class StyleTest extends TestCase
{
    /**
     * @var Style
     */
    protected $style;

    protected function setUp(): void
    {
        $this->style = new Style();
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitStyle')
          ->with(self::equalTo($this->style));

        $this->style->accept($objectVisitor);
    }

    public function testIconStyleField(): void
    {
        $iconStyle = new IconStyle();

        $this->style->setIconStyle($iconStyle);

        self::assertEquals($iconStyle, $this->style->getIconStyle());
    }

    public function testLabelStyleField(): void
    {
        $labelStyle = new LabelStyle();

        $this->style->setLabelStyle($labelStyle);

        self::assertEquals($labelStyle, $this->style->getLabelStyle());
    }

    public function testLineStyleField(): void
    {
        $lineStyle = new LineStyle();

        $this->style->setLineStyle($lineStyle);

        self::assertEquals($lineStyle, $this->style->getLineStyle());
    }

    public function testPolyStyleField(): void
    {
        $polyStyle = new PolyStyle();

        $this->style->setPolyStyle($polyStyle);

        self::assertEquals($polyStyle, $this->style->getPolyStyle());
    }

    public function testBalloonStyleField(): void
    {
        $balloonStyle = new BalloonStyle();

        $this->style->setBalloonStyle($balloonStyle);

        self::assertEquals($balloonStyle, $this->style->getBalloonStyle());
    }

    public function testListStyleField(): void
    {
        $listStyle = new ListStyle();

        $this->style->setListStyle($listStyle);

        self::assertEquals($listStyle, $this->style->getListStyle());
    }
}
