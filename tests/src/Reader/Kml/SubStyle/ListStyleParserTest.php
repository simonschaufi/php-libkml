<?php

namespace LibKml\Tests\Reader\Kml\SubStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ListItemType;
use LibKml\Domain\SubStyle\ListStyle;
use LibKml\Reader\Kml\SubStyle\ListStyleParser;
use PHPUnit\Framework\TestCase;

class ListStyleParserTest extends TestCase {

  const KML_BALLOON_STYLE = <<<'TAG'
<ListStyle>
  <listItemType>radioFolder</listItemType>
  <bgColor>aabbccdd</bgColor>
</ListStyle>
TAG;

  /**
   * @var ListStyleParser
   */
  protected $listStyleParser;

  protected $listStyleKmlElement;

  /**
   * @var ListStyle
   */
  protected $listStyle;

  public function setUp() {
    $this->listStyleParser = new ListStyleParser();
    $this->listStyleKmlElement = simplexml_load_string(self::KML_BALLOON_STYLE);
    $this->listStyle = $this->listStyleParser->parse($this->listStyleKmlElement);
  }

  public function testBgColor() {
    $color = Color::fromRGBA(0xdd, 0xcc, 0xbb, 0xaa / 0xff);

    $this->assertEquals($color, $this->listStyle->getBgColor());
  }

  public function testListItemType() {
    $this->assertEquals(ListItemType::RADIO_FOLDER, $this->listStyle->getListItemType());
  }

}
