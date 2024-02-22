<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\SubStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\ItemIcon;
use LibKml\Domain\SubStyle\ListStyle;
use PHPUnit\Framework\TestCase;

final class ListStyleTest extends TestCase
{
    private ListStyle $listStyle;

    protected function setUp(): void
    {
        $this->listStyle = new ListStyle();
    }

    public function testAccept(): void
    {
        $timeStamp = new ListStyle();

        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitListStyle')
          ->with(self::equalTo($timeStamp));

        $timeStamp->accept($objectVisitor);
    }

    public function testBgColorField(): void
    {
        $bgColor = new Color();

        $this->listStyle->setBgColor($bgColor);

        self::assertEquals($bgColor, $this->listStyle->getBgColor());
    }

    public function testListItemTypeField(): void
    {
        $listItemType = 'radioFolder';

        $this->listStyle->setListItemType($listItemType);

        self::assertEquals($listItemType, $this->listStyle->getListItemType());
    }

    public function testItemIconField(): void
    {
        $itemIcon = new ItemIcon();

        $this->listStyle->setItemIcon($itemIcon);

        self::assertEquals($itemIcon, $this->listStyle->getItemIcon());
    }
}
