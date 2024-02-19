<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\FieldType;

use LibKml\Domain\AbstractView\AbstractView;
use LibKml\Domain\FieldType\NetworkLinkControl;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\Update;
use PHPUnit\Framework\TestCase;

final class NetworkLinkControlTest extends TestCase
{
    private NetworkLinkControl $networkLinkControl;

    protected function setUp(): void
    {
        $this->networkLinkControl = new NetworkLinkControl();
    }

    public function testCookieField(): void
    {
        $cookie = 'key:value';

        $this->networkLinkControl->setCookie($cookie);

        self::assertEquals($cookie, $this->networkLinkControl->getCookie());
    }

    public function testMessageField(): void
    {
        $message = 'London Bridge';

        $this->networkLinkControl->setMessage($message);

        self::assertEquals($message, $this->networkLinkControl->getMessage());
    }

    public function testLinkNameField(): void
    {
        $linkName = 'London Bridge';

        $this->networkLinkControl->setLinkName($linkName);

        self::assertEquals($linkName, $this->networkLinkControl->getLinkName());
    }

    public function testLinkDescriptionField(): void
    {
        $linkDescription = 'London Bridge';

        $this->networkLinkControl->setLinkDescription($linkDescription);

        self::assertEquals($linkDescription, $this->networkLinkControl->getLinkDescription());
    }

    public function testMinRefreshPeriodField(): void
    {
        $minRefreshPeriod = 4.78;

        $this->networkLinkControl->setMinRefreshPeriod($minRefreshPeriod);

        self::assertEquals($minRefreshPeriod, $this->networkLinkControl->getMinRefreshPeriod());
    }

    public function testMaxSessionLengthField(): void
    {
        $maxSessionLength = 1000.5;

        $this->networkLinkControl->setMaxSessionLength($maxSessionLength);

        self::assertEquals($maxSessionLength, $this->networkLinkControl->getMaxSessionLength());
    }

    public function testLinkSnippetField(): void
    {
        $linkSnippet = 'London Bridge';

        $this->networkLinkControl->setLinkSnippet($linkSnippet);

        self::assertEquals($linkSnippet, $this->networkLinkControl->getLinkSnippet());
    }

    public function testExpiresField(): void
    {
        $expires = '1997-07-16T07:30:15Z';

        $this->networkLinkControl->setExpires($expires);

        self::assertEquals($expires, $this->networkLinkControl->getExpires());
    }

    public function testUpdateField(): void
    {
        $update = new Update();

        $this->networkLinkControl->setUpdate($update);

        self::assertEquals($update, $this->networkLinkControl->getUpdate());
    }

    public function testAbstractViewField(): void
    {
        $abstractView = new class() extends AbstractView {
            public function accept(KmlObjectVisitorInterface $visitor): void {}
        };

        $this->networkLinkControl->setAbstractView($abstractView);

        self::assertEquals($abstractView, $this->networkLinkControl->getAbstractView());
    }
}
