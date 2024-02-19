<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\SubStyle;

use LibKml\Domain\SubStyle\ItemIcon;
use PHPUnit\Framework\TestCase;

final class ItemIconTest extends TestCase
{
    /**
     * @var ItemIcon
     */
    protected $itemIcon;

    protected function setUp(): void
    {
        $this->itemIcon = new ItemIcon();
    }

    public function testHrefField(): void
    {
        $href = 'http://www.google.com';

        $this->itemIcon->setHref($href);

        self::assertEquals($href, $this->itemIcon->getHref());
    }

    public function testStateField(): void
    {
        $state = 'closed';

        $this->itemIcon->setState($state);

        self::assertEquals($state, $this->itemIcon->getState());
    }
}
