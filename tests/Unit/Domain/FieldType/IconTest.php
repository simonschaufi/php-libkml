<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\FieldType;

use LibKml\Domain\Icon;
use PHPUnit\Framework\TestCase;

final class IconTest extends TestCase
{
    private Icon $icon;

    protected function setUp(): void
    {
        $this->icon = new Icon();
    }

    public function testHrefField(): void
    {
        $href = 'https://www.google.com';

        $this->icon->setHref($href);

        self::assertEquals($href, $this->icon->getHref());
    }
}
