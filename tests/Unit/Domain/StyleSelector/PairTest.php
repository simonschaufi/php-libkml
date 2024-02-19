<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\StyleSelector;

use LibKml\Domain\StyleSelector\Pair;
use LibKml\Domain\StyleSelector\Style;
use PHPUnit\Framework\TestCase;

final class PairTest extends TestCase
{
    private Pair $pair;

    protected function setUp(): void
    {
        $this->pair = new Pair();
    }

    public function testKeyField(): void
    {
        $key = 'relativeToGround';

        $this->pair->setKey($key);

        self::assertEquals($key, $this->pair->getKey());
    }

    public function testStyleUrlField(): void
    {
        $styleUrl = '#myDefaultStyles';

        $this->pair->setStyleUrl($styleUrl);

        self::assertEquals($styleUrl, $this->pair->getStyleUrl());
    }

    public function testStyleField(): void
    {
        $style = new Style();

        $this->pair->setStyle($style);

        self::assertEquals($style, $this->pair->getStyle());
    }
}
