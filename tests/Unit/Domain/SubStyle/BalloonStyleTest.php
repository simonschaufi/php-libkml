<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\SubStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\BalloonStyle;
use PHPUnit\Framework\TestCase;

final class BalloonStyleTest extends TestCase
{
    /**
     * @var BalloonStyle
     */
    protected $balloonStyle;

    protected function setUp(): void
    {
        $this->balloonStyle = new BalloonStyle();
    }

    public function testAccept(): void
    {
        $timeStamp = new BalloonStyle();

        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitBalloonStyle')
          ->with(self::equalTo($timeStamp));

        $timeStamp->accept($objectVisitor);
    }

    public function testBgColorField(): void
    {
        $bgColor = new Color();

        $this->balloonStyle->setBgColor($bgColor);

        self::assertEquals($bgColor, $this->balloonStyle->getBgColor());
    }

    public function testTextColorField(): void
    {
        $textColor = new Color();

        $this->balloonStyle->setTextColor($textColor);

        self::assertEquals($textColor, $this->balloonStyle->getTextColor());
    }

    public function testTextField(): void
    {
        $text = 'Balloon text';

        $this->balloonStyle->setText($text);

        self::assertEquals($text, $this->balloonStyle->getText());
    }

    public function testDisplayModeField(): void
    {
        $displayMode = 'hide';

        $this->balloonStyle->setDisplayMode($displayMode);

        self::assertEquals($displayMode, $this->balloonStyle->getDisplayMode());
    }
}
