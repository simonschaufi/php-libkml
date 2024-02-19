<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\FieldType;

use LibKml\Domain\Icon;
use PHPUnit\Framework\TestCase;

final class IconTest extends TestCase
{
    /**
     * @var Icon
     */
    protected $icon;

    protected function setUp(): void
    {
        $this->icon = new Icon();
    }

    public function testLongitudeField(): void
    {
        $href = 'https://www.google.com';

        $this->icon->setHref($href);

        self::assertEquals($href, $this->icon->getHref());
    }
}
