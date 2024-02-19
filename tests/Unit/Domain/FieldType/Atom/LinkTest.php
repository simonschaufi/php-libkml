<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\FieldType\Atom;

use LibKml\Domain\FieldType\Atom\Link;
use PHPUnit\Framework\TestCase;

final class LinkTest extends TestCase
{
    private Link $link;

    protected function setUp(): void
    {
        $this->link = new Link();
    }

    public function testHrefField(): void
    {
        $href = 'http://www.google.com';

        $this->link->setHref($href);

        self::assertEquals($href, $this->link->getHref());
    }

    public function testRelField(): void
    {
        $rel = 'http://www.google.com/rel';

        $this->link->setRel($rel);

        self::assertEquals($rel, $this->link->getRel());
    }

    public function testTypeField(): void
    {
        $type = 'text/html';

        $this->link->setType($type);

        self::assertEquals($type, $this->link->getType());
    }

    public function testHreflangField(): void
    {
        $hreflang = 'en';

        $this->link->setHreflang($hreflang);

        self::assertEquals($hreflang, $this->link->getHreflang());
    }

    public function testTitleField(): void
    {
        $title = 'Bio page';

        $this->link->setTitle($title);

        self::assertEquals($title, $this->link->getTitle());
    }

    public function testLengthField(): void
    {
        $length = 1024;

        $this->link->setLength($length);

        self::assertEquals($length, $this->link->getLength());
    }
}
