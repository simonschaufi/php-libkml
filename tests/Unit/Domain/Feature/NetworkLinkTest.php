<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature;

use LibKml\Domain\Feature\NetworkLink;
use LibKml\Domain\KmlDocument;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\Link;
use PHPUnit\Framework\TestCase;

final class NetworkLinkTest extends TestCase
{
    /**
     * @var NetworkLink
     */
    protected $networkLink;

    protected function setUp(): void
    {
        $this->networkLink = new NetworkLink();
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitNetworkLink')
          ->with(self::equalTo($this->networkLink));

        $this->networkLink->accept($objectVisitor);
    }

    public function testRefreshVisibilityField(): void
    {
        $refreshVisibility = true;

        $this->networkLink->setRefreshVisibility($refreshVisibility);

        self::assertEquals($refreshVisibility, $this->networkLink->getRefreshVisibility());
    }

    public function testFlyToViewField(): void
    {
        $flyToView = true;

        $this->networkLink->setFlyToView($flyToView);

        self::assertEquals($flyToView, $this->networkLink->getFlyToView());
    }

    public function testLinkField(): void
    {
        $link = new Link();

        $this->networkLink->setLink($link);

        self::assertEquals($link, $this->networkLink->getLink());
    }

    public function testKmlDocumentField(): void
    {
        $kmlDocument = new KmlDocument();

        $this->networkLink->setKmlDocument($kmlDocument);

        self::assertEquals($kmlDocument, $this->networkLink->getKmlDocument());
    }
}
