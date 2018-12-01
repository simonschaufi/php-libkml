<?php

namespace LibKml\Tests\Domain;

use LibKml\Domain\AbstractView\AbstractView;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\NetworkLinkControl;
use LibKml\Domain\Update;
use PHPUnit\Framework\TestCase;

class NetworkLinkControlTest extends TestCase {

  /**
   * @var NetworkLinkControl
   */
  protected $networkLinkControl;

  public function setUp() {
    $this->networkLinkControl = new NetworkLinkControl();
  }

  public function testCookieField() {
    $cookie = "key:value";

    $this->networkLinkControl->setCookie($cookie);

    $this->assertEquals($cookie, $this->networkLinkControl->getCookie());
  }

  public function testMessageField() {
    $message = "London Bridge";

    $this->networkLinkControl->setMessage($message);

    $this->assertEquals($message, $this->networkLinkControl->getMessage());
  }

  public function testLinkNameField() {
    $linkName = "London Bridge";

    $this->networkLinkControl->setLinkName($linkName);

    $this->assertEquals($linkName, $this->networkLinkControl->getLinkName());
  }

  public function testLinkDescriptionField() {
    $linkDescription = "London Bridge";

    $this->networkLinkControl->setLinkDescription($linkDescription);

    $this->assertEquals($linkDescription, $this->networkLinkControl->getLinkDescription());
  }

  public function testMinRefreshPeriodField() {
    $minRefreshPeriod = 4.78;

    $this->networkLinkControl->setMinRefreshPeriod($minRefreshPeriod);

    $this->assertEquals($minRefreshPeriod, $this->networkLinkControl->getMinRefreshPeriod());
  }

  public function testMaxSessionLengthField() {
    $maxSessionLength = 1000.5;

    $this->networkLinkControl->setMaxSessionLength($maxSessionLength);

    $this->assertEquals($maxSessionLength, $this->networkLinkControl->getMaxSessionLength());
  }

  public function testLinkSnippetField() {
    $linkSnippet = "London Bridge";

    $this->networkLinkControl->setLinkSnippet($linkSnippet);

    $this->assertEquals($linkSnippet, $this->networkLinkControl->getLinkSnippet());
  }

  public function testExpiresField() {
    $expires = 23891798741;

    $this->networkLinkControl->setExpires($expires);

    $this->assertEquals($expires, $this->networkLinkControl->getExpires());
  }

  public function testUpdateField() {
    $update = new Update();

    $this->networkLinkControl->setUpdate($update);

    $this->assertEquals($update, $this->networkLinkControl->getUpdate());
  }

  public function testAbstractViewField() {
    $abstractView = new class extends AbstractView {
      public function accept(KmlObjectVisitorInterface $visitor): void {
      }
    };

    $this->networkLinkControl->setAbstractView($abstractView);

    $this->assertEquals($abstractView, $this->networkLinkControl->getAbstractView());
  }
}
