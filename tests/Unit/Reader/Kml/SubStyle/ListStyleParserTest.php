<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\SubStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ListItemType;
use LibKml\Domain\SubStyle\ListStyle;
use LibKml\Reader\Kml\SubStyle\ListStyleParser;
use PHPUnit\Framework\TestCase;

final class ListStyleParserTest extends TestCase
{
    private const KML_BALLOON_STYLE = <<<'TAG'
<ListStyle id="ID">
  <listItemType>radioFolder</listItemType>
  <bgColor>aabbccdd</bgColor>
  <ItemIcon>
    <state>open</state>
    <href>https://example.com</href>
  </ItemIcon>
</ListStyle>
TAG;

    private ListStyle $listStyle;

    protected function setUp(): void
    {
        $listStyleParser = new ListStyleParser();
        $this->listStyle = $listStyleParser->parse(simplexml_load_string(self::KML_BALLOON_STYLE));
    }

    public function testBgColor(): void
    {
        $color = Color::fromRGBA(0xdd, 0xcc, 0xbb, 0xaa / 0xff);

        self::assertEquals($color, $this->listStyle->getBgColor());
    }

    public function testListItemType(): void
    {
        self::assertEquals(ListItemType::RADIO_FOLDER, $this->listStyle->getListItemType());
    }
}
