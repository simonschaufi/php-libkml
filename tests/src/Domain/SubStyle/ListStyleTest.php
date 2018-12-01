<?php

namespace LibKml\Tests\Domain\SubStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\ItemIcon;
use LibKml\Domain\SubStyle\ListStyle;
use PHPUnit\Framework\TestCase;

class ListStyleTest extends TestCase {

  /**
   * @var ListStyle
   */
  protected $listStyle;

  public function setUp() {
    $this->listStyle = new ListStyle();
  }

  public function testAccept() {
    $timeStamp = new ListStyle();

    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitListStyle')
      ->with($this->equalTo($timeStamp));

    $timeStamp->accept($objectVisitor);
  }

  public function testBgColorField() {
    $bgColor = new Color();

    $this->listStyle->setBgColor($bgColor);

    $this->assertEquals($bgColor, $this->listStyle->getBgColor());
  }

  public function testListItemTypeField() {
    $listItemType = "radioFolder";

    $this->listStyle->setListItemType($listItemType);

    $this->assertEquals($listItemType, $this->listStyle->getListItemType());
  }

  public function testItemIconField() {
    $itemIcon = new ItemIcon();

    $this->listStyle->setItemIcon($itemIcon);

    $this->assertEquals($itemIcon, $this->listStyle->getItemIcon());
  }

  
}
