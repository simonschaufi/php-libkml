<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\StyleSelector;

use LibKml\Domain\StyleSelector\Style;
use LibKml\Reader\Kml\StyleSelector\StyleSelectorExtractor;
use PHPUnit\Framework\TestCase;

final class StyleSelectorExtractorTest extends TestCase
{
    private const KML_NO_STYLE = <<<'TAG'
<Document id="document-1" targetId="target-1">
  <name>Document with XML id</name>
  <open>1</open>
</Document>
TAG;

    private const KML_STYLE = <<<'TAG'
<Document id="document-1" targetId="target-1">
  <name>Document with XML id</name>
  <open>1</open>
  <Style id="style-1" targetId="target-1">
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
    <PolyStyle>
      <color>7f7faaaa</color>
      <colorMode>random</colorMode>
    </PolyStyle>
  </Style>
</Document>
TAG;

    private const KML_STYLES = <<<'TAG'
<Document id="document-1" targetId="target-1">
  <name>Document with XML id</name>
  <open>1</open>
  <Style id="style-1" targetId="target-1">
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
  </Style>
  <Style id="style-2" targetId="target-2">
    <LineStyle>
      <color>ff0000ff</color>
      <width>15</width>
    </LineStyle>
    <PolyStyle>
      <color>7f7faaaa</color>
      <colorMode>random</colorMode>
    </PolyStyle>
  </Style>
</Document>
TAG;

    public function testExtractStyle(): void
    {
        $kmlElement = simplexml_load_string(self::KML_STYLE);

        $style = StyleSelectorExtractor::extractStyleSelector($kmlElement);

        self::assertInstanceOf(Style::class, $style);
    }

    public function testExtractNoStyle(): void
    {
        $kmlElement = simplexml_load_string(self::KML_NO_STYLE);

        $style = StyleSelectorExtractor::extractStyleSelector($kmlElement);

        self::assertNull($style);
    }

    public function testExtractStyles(): void
    {
        $kmlElement = simplexml_load_string(self::KML_STYLES);

        $styles = StyleSelectorExtractor::extractStyleSelectors($kmlElement);

        self::assertCount(2, $styles);
        self::assertContainsOnlyInstancesOf(Style::class, $styles);
    }

    public function testExtractNoStyles(): void
    {
        $kmlElement = simplexml_load_string(self::KML_NO_STYLE);

        $styles = StyleSelectorExtractor::extractStyleSelectors($kmlElement);

        self::assertCount(0, $styles);
    }
}
