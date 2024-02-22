<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain;

use LibKml\Domain\Feature\Feature;
use LibKml\Domain\FieldType\NetworkLinkControl;
use LibKml\Domain\KmlDocument;
use LibKml\Domain\KmlObjectVisitorInterface;

use PHPUnit\Framework\TestCase;

final class KmlDocumentTest extends TestCase
{
    private KmlDocument $kmlDocument;

    protected function setUp(): void
    {
        $this->kmlDocument = new KmlDocument();
    }

    public function testNetworkLinkControlField(): void
    {
        $networkLinkControl = new NetworkLinkControl();

        $this->kmlDocument->setNetworkLinkControl($networkLinkControl);

        self::assertEquals($networkLinkControl, $this->kmlDocument->getNetworkLinkControl());
    }

    public function testFeatureField(): void
    {
        $feature = new class() extends Feature {
            public function accept(KmlObjectVisitorInterface $visitor): void {}
        };

        $this->kmlDocument->setFeature($feature);

        self::assertEquals($feature, $this->kmlDocument->getFeature());
    }
}
