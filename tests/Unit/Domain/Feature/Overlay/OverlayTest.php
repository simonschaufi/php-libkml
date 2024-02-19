<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\Overlay;
use LibKml\Domain\FieldType\Color;
use LibKml\Domain\Icon;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class OverlayTest extends TestCase
{
    /**
     * @var Overlay
     */
    protected $overlay;

    protected function setUp(): void
    {
        $this->overlay = new class() extends Overlay {
            public function accept(KmlObjectVisitorInterface $visitor): void {}
        };
    }

    public function testColorField(): void
    {
        $color = new Color();

        $this->overlay->setColor($color);

        self::assertEquals($color, $this->overlay->getColor());
    }

    public function testDrawOrderField(): void
    {
        $drawOrder = 13;

        $this->overlay->setDrawOrder($drawOrder);

        self::assertEquals($drawOrder, $this->overlay->getDrawOrder());
    }

    public function testIconField(): void
    {
        $icon = new Icon();

        $this->overlay->setIcon($icon);

        self::assertEquals($icon, $this->overlay->getIcon());
    }
}
