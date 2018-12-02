<?php

namespace LibKml\Tests\Domain\Feature;

use LibKml\Domain\Feature\NetworkLink;
use LibKml\Domain\Link;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\KmlDocument;
use PHPUnit\Framework\TestCase;

class NetworkLinkTest extends TestCase {

  /**
   * @var NetworkLink
   */
  protected $networkLink;

  public function setUp() {
    $this->networkLink = new NetworkLink();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitNetworkLink')
      ->with($this->equalTo($this->networkLink));

    $this->networkLink->accept($objectVisitor);
  }

  public function testRefreshVisibilityField() {
    $refreshVisibility = true;

    $this->networkLink->setRefreshVisibility($refreshVisibility);

    $this->assertEquals($refreshVisibility, $this->networkLink->getRefreshVisibility());
  }

  public function testFlyToViewField() {
    $flyToView = true;

    $this->networkLink->setFlyToView($flyToView);

    $this->assertEquals($flyToView, $this->networkLink->getFlyToView());
  }

  public function testLinkField() {
    $link = new Link();

    $this->networkLink->setLink($link);

    $this->assertEquals($link, $this->networkLink->getLink());
  }

  public function testKmlDocumentField() {
    $kmlDocument = new KmlDocument();

    $this->networkLink->setKmlDocument($kmlDocument);

    $this->assertEquals($kmlDocument, $this->networkLink->getKmlDocument());
  }

}
