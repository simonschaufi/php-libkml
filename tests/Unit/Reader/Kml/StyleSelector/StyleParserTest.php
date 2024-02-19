<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\StyleSelector;

use LibKml\Domain\KmlObject;
use LibKml\Domain\StyleSelector\Style;
use LibKml\Domain\SubStyle\ColorStyle\IconStyle;
use LibKml\Domain\SubStyle\ColorStyle\LabelStyle;
use LibKml\Domain\SubStyle\ColorStyle\LineStyle;
use LibKml\Domain\SubStyle\ColorStyle\PolyStyle;
use LibKml\Reader\Kml\StyleSelector\StyleParser;
use PHPUnit\Framework\TestCase;

final class StyleParserTest extends TestCase
{
    private const KML_STYLE = <<<'TAG'
<Style id="style-1" targetId="target-1">
  <BalloonStyle>
    <bgColor>ffffffbb</bgColor>
    <text><![CDATA[
    <b><font color="#CC0000" size="+3">$[name]</font></b>
    <br/><br/>
    <font face="Courier">$[description]</font>
    <br/><br/>
    Extra text that will appear in the description balloon
    <br/><br/>
    <!-- insert the to/from hyperlinks -->
    $[geDirections]
    ]]></text>
  </BalloonStyle>
  <IconStyle>
    <color>a1ff00ff</color>
    <scale>1.399999976158142</scale>
    <Icon>
      <href>http://myserver.com/icon.jpg</href>
    </Icon>
  </IconStyle>
  <LabelStyle>
    <color>7fffaaff</color>
    <scale>1.5</scale>
  </LabelStyle>
  <LineStyle>
    <color>ff0000ff</color>
    <width>15</width>
  </LineStyle>
  <ListStyle>
    <listItemType>radioFolder</listItemType>
  </ListStyle>
  <PolyStyle>
    <color>7f7faaaa</color>
    <colorMode>random</colorMode>
  </PolyStyle>
</Style>
TAG;

    private StyleParser $styleParser;

    /**
     * @var Style
     */
    private KmlObject $style;

    protected function setUp(): void
    {
        $this->styleParser = new StyleParser();
        $kmlElement = simplexml_load_string(self::KML_STYLE);
        $this->style = $this->styleParser->parse($kmlElement);
    }

    public function testParse(): void
    {
        self::assertInstanceOf(Style::class, $this->style);
    }

    public function testParseIconStyle(): void
    {
        self::assertInstanceOf(IconStyle::class, $this->style->getIconStyle());
    }

    public function testParseLabelStyle(): void
    {
        self::assertInstanceOf(LabelStyle::class, $this->style->getLabelStyle());
    }

    public function testParseLineStyle(): void
    {
        self::assertInstanceOf(LineStyle::class, $this->style->getLineStyle());
    }

    public function testParsePolyStyle(): void
    {
        self::assertInstanceOf(PolyStyle::class, $this->style->getPolyStyle());
    }
}
