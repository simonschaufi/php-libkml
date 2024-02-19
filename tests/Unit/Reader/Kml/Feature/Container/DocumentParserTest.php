<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Feature\Container;

use LibKml\Domain\Feature\Container\Document;
use LibKml\Domain\Feature\Placemark;
use LibKml\Domain\FieldType\Schema;
use LibKml\Reader\Kml\Feature\Container\DocumentParser;
use PHPUnit\Framework\TestCase;

final class DocumentParserTest extends TestCase
{
    public const KML_DOCUMENT = <<<'TAG'
<Document id="document-1" targetId="target-1">
  <name>Document.kml</name>
  <open>1</open>
  <Style id="exampleStyleDocument">
    <LabelStyle>
      <color>ff0000cc</color>
    </LabelStyle>
  </Style>
  <Placemark>
    <name>Document Feature 1</name>
    <styleUrl>#exampleStyleDocument</styleUrl>
    <Point>
      <coordinates>-122.371,37.816,0</coordinates>
    </Point>
  </Placemark>
  <Placemark>
    <name>Document Feature 2</name>
    <styleUrl>#exampleStyleDocument</styleUrl>
    <Point>
      <coordinates>-122.370,37.817,0</coordinates>
    </Point>
  </Placemark>
  <Schema name="TrailHeadType" id="TrailHeadTypeId">
    <SimpleField type="string" name="TrailHeadName">
      <displayName><![CDATA[<b>Trail Head Name</b>]]></displayName>
    </SimpleField>
    <SimpleField type="double" name="TrailLength">
      <displayName><![CDATA[<i>The length in miles</i>]]></displayName>
    </SimpleField>
    <SimpleField type="int" name="ElevationGain">
      <displayName><![CDATA[<i>change in altitude</i>]]></displayName>
    </SimpleField>
  </Schema>
</Document>
TAG;

    protected $documentParser;

    protected function setUp(): void
    {
        $this->documentParser = new DocumentParser();
    }

    public function testParse(): void
    {
        $element = simplexml_load_string(self::KML_DOCUMENT);

        $kmlObject = $this->documentParser->parse($element);

        self::assertInstanceOf(Document::class, $kmlObject);
        self::assertEquals('document-1', $kmlObject->getId());
        self::assertEquals('target-1', $kmlObject->getTargetId());
        self::assertEquals('Document.kml', $kmlObject->getName());
        self::assertTrue($kmlObject->getOpen());
        self::assertCount(2, $kmlObject->getFeatures());
        self::assertContainsOnlyInstancesOf(Placemark::class, $kmlObject->getFeatures());
        self::assertCount(1, $kmlObject->getSchemas());
        self::assertContainsOnlyInstancesOf(Schema::class, $kmlObject->getSchemas());
    }
}
