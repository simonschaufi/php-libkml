<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\ViewVolume;
use PHPUnit\Framework\TestCase;

final class ViewVolumeTest extends TestCase
{
    /**
     * @var ViewVolume
     */
    protected $viewVolume;

    protected function setUp(): void
    {
        $this->viewVolume = new ViewVolume();
    }

    public function testLeftFovField(): void
    {
        $leftFov = 26.4554;

        $this->viewVolume->setLeftFov($leftFov);

        self::assertEquals($leftFov, $this->viewVolume->getLeftFov());
    }

    public function testRightFovField(): void
    {
        $leftFov = 26.4554;

        $this->viewVolume->setRightFov($leftFov);

        self::assertEquals($leftFov, $this->viewVolume->getRightFov());
    }

    public function testBottomFovField(): void
    {
        $leftFov = 26.4554;

        $this->viewVolume->setBottomFov($leftFov);

        self::assertEquals($leftFov, $this->viewVolume->getBottomFov());
    }

    public function testTopFovField(): void
    {
        $leftFov = 26.4554;

        $this->viewVolume->setTopFov($leftFov);

        self::assertEquals($leftFov, $this->viewVolume->getTopFov());
    }

    public function testNearField(): void
    {
        $leftFov = 26.4554;

        $this->viewVolume->setNear($leftFov);

        self::assertEquals($leftFov, $this->viewVolume->getNear());
    }
}
