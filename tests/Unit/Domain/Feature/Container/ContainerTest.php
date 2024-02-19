<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature\Container;

use LibKml\Domain\Feature\Container\Container;
use LibKml\Domain\Feature\Placemark;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class ContainerTest extends TestCase
{
    private Container $container;

    private Placemark $placemark1;
    private Placemark $placemark2;
    private array $features = [];

    protected function setUp(): void
    {
        $this->container = new class() extends Container {
            public function accept(KmlObjectVisitorInterface $visitor): void {}
        };
        $this->placemark1 = new Placemark();
        $this->placemark2 = new Placemark();
        $this->features = [$this->placemark1, $this->placemark2];
    }

    public function testFeaturesField(): void
    {
        $this->container->setFeatures($this->features);

        self::assertCount(2, $this->container->getFeatures());
        self::assertContains($this->placemark1, $this->container->getFeatures());
        self::assertContains($this->placemark2, $this->container->getFeatures());
    }

    public function testAddFeature(): void
    {
        $this->container->addFeature($this->placemark1);

        self::assertCount(1, $this->container->getFeatures());
        self::assertContains($this->placemark1, $this->container->getFeatures());
    }

    public function testClearFeatures(): void
    {
        $this->container->setFeatures($this->features);

        $this->container->clearFeatures();

        self::assertCount(0, $this->container->getFeatures());
    }
}
