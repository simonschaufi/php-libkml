<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain;

use LibKml\Domain\Scale;
use PHPUnit\Framework\TestCase;

final class ScaleTest extends TestCase
{
    /**
     * @var Scale
     */
    protected $scale;

    protected function setUp(): void
    {
        $this->scale = new Scale();
    }

    public function testDefaultValues(): void
    {
        self::assertEquals(0, $this->scale->getX());
        self::assertEquals(0, $this->scale->getY());
        self::assertEquals(0, $this->scale->getZ());
    }

    public function testFromCoordinates(): void
    {
        $x = 45.23;
        $y = 13.12;
        $z = 1.678;

        $scale = Scale::fromCoordinates($x, $y, $z);

        self::assertEquals($x, $scale->getX());
        self::assertEquals($y, $scale->getY());
        self::assertEquals($z, $scale->getZ());
    }

    public function testXField(): void
    {
        $x = 1.34;

        $this->scale->setX($x);

        self::assertEquals($x, $this->scale->getX());
    }

    public function testYField(): void
    {
        $y = 1.34;

        $this->scale->setY($y);

        self::assertEquals($y, $this->scale->getY());
    }

    public function testZField(): void
    {
        $z = 1.34;

        $this->scale->setZ($z);

        self::assertEquals($z, $this->scale->getZ());
    }
}
