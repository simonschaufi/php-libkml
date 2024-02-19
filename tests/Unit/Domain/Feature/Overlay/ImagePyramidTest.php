<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\ImagePyramid;
use PHPUnit\Framework\TestCase;

final class ImagePyramidTest extends TestCase
{
    private ImagePyramid $imagePyramid;

    protected function setUp(): void
    {
        $this->imagePyramid = new ImagePyramid();
    }

    public function testTileSizeField(): void
    {
        $tileSize = 256;

        $this->imagePyramid->setTileSize($tileSize);

        self::assertEquals($tileSize, $this->imagePyramid->getTileSize());
    }

    public function testMaxWidthField(): void
    {
        $maxWidth = 256;

        $this->imagePyramid->setMaxWidth($maxWidth);

        self::assertEquals($maxWidth, $this->imagePyramid->getMaxWidth());
    }

    public function testMaxHeightField(): void
    {
        $maxHeight = 256;

        $this->imagePyramid->setMaxHeight($maxHeight);

        self::assertEquals($maxHeight, $this->imagePyramid->getMaxHeight());
    }

    public function testGridOriginField(): void
    {
        $gridOrigin = 'lowerLeft';

        $this->imagePyramid->setGridOrigin($gridOrigin);

        self::assertEquals($gridOrigin, $this->imagePyramid->getGridOrigin());
    }
}
