<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain;

use LibKml\Domain\Lod;
use PHPUnit\Framework\TestCase;

final class LodTest extends TestCase
{
    private Lod $lod;

    protected function setUp(): void
    {
        $this->lod = new Lod();
    }

    public function testMinLodPixelsField(): void
    {
        $minLodPixels = 256;

        $this->lod->setMinLodPixels($minLodPixels);

        self::assertEquals($minLodPixels, $this->lod->getMinLodPixels());
    }

    public function testMaxLodPixelsField(): void
    {
        $maxLodPixels = 1024;

        $this->lod->setMaxLodPixels($maxLodPixels);

        self::assertEquals($maxLodPixels, $this->lod->getMaxLodPixels());
    }

    public function testMinFadeExtentField(): void
    {
        $minFadeExtent = 256;

        $this->lod->setMinFadeExtent($minFadeExtent);

        self::assertEquals($minFadeExtent, $this->lod->getMinFadeExtent());
    }

    public function testMaxFadeExtentField(): void
    {
        $maxFadeExtent = 256;

        $this->lod->setMaxFadeExtent($maxFadeExtent);

        self::assertEquals($maxFadeExtent, $this->lod->getMaxFadeExtent());
    }
}
