<?php

namespace LibKml\Tests\Reader\Kml\StyleSelector;

use LibKml\Domain\StyleSelector\Style;
use LibKml\Domain\SubStyle\ColorStyle\IconStyle;
use LibKml\Domain\SubStyle\ColorStyle\LabelStyle;
use LibKml\Domain\SubStyle\ColorStyle\LineStyle;
use LibKml\Domain\SubStyle\ColorStyle\PolyStyle;
use LibKml\Reader\Kml\StyleSelector\StyleParser;
use PHPUnit\Framework\TestCase;

class StyleParserTest extends TestCase {

  const KML_STYLE = <<<'TAG'
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

  /**
   * @var StyleParser
   */
  protected $styleParser;

  /**
   * @var Style
   */
  protected $style;

  public function setUp() {
    $this->styleParser = new StyleParser();
    $kmlElement = simplexml_load_string(self::KML_STYLE);
    $this->style = $this->styleParser->parse($kmlElement);
  }

  public function testParse() {
    $this->assertInstanceOf(Style::class, $this->style);
  }

  public function testParseIconStyle() {
    $this->assertInstanceOf(IconStyle::class, $this->style->getIconStyle());
  }

  public function testParseLabelStyle() {
    $this->assertInstanceOf(LabelStyle::class, $this->style->getLabelStyle());
  }

  public function testParseLineStyle () {
    $this->assertInstanceOf(LineStyle::class, $this->style->getLineStyle());
  }

  public function testParsePolyStyle () {
    $this->assertInstanceOf(PolyStyle::class, $this->style->getPolyStyle());
  }

}
