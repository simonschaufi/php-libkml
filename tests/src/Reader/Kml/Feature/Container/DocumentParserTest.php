<?php

namespace LibKml\Tests\Reader\Kml\Feature\Container;

use LibKml\Domain\Feature\Container\Document;
use LibKml\Domain\Feature\Placemark;
use LibKml\Domain\FieldType\Schema;
use LibKml\Reader\Kml\Feature\Container\DocumentParser;
use PHPUnit\Framework\TestCase;

class DocumentParserTest extends TestCase {

  const KML_DOCUMENT = <<<'TAG'
<Document id="document-1" targetId="target-1">
  <name>Document.kml</name>
  <open>1</open>
  <visibility>0</visibility>
  <address>Feature address</address>
  <phoneNumber>7897688976</phoneNumber>
  <Snippet>Feature snippet</Snippet>
  <description>Feature description</description>
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

  protected $document;

  public function setUp() {
    $documentParser = new DocumentParser();
    $element = simplexml_load_string(self::KML_DOCUMENT);
    $this->document = $documentParser->parse($element);
  }

  public function testParse() {
    $this->assertInstanceOf(Document::class, $this->document);
  }

  public function testParseId() {
    $this->assertEquals("document-1", $this->document->getId());
  }

  public function testParseTargetId() {
    $this->assertEquals("target-1", $this->document->getTargetId());
  }

  public function testParseName() {
    $this->assertEquals("Document.kml", $this->document->getName());
  }

  public function testParseVisibility() {
    $this->assertFalse($this->document->getVisibility());
  }

  public function testParseOpen() {
    $this->assertTrue($this->document->getOpen());
  }

  public function testParseAddress() {
    $this->assertEquals('Feature address', $this->document->getAddress());
  }

  public function testParsePhoneNumber() {
    $this->assertEquals('7897688976', $this->document->getPhoneNumber());
  }

  public function testParseSnippet() {
    $this->assertEquals('Feature snippet', $this->document->getSnippet());
  }

  public function testParseDescription() {
    $this->assertEquals('Feature description', $this->document->getDescription());
  }

  public function testParseFeatures() {
    $this->assertCount(2, $this->document->getFeatures());
    $this->assertContainsOnlyInstancesOf(Placemark::class, $this->document->getFeatures());
  }

  public function testParseSchemas() {
    $this->assertCount(1, $this->document->getSchemas());
    $this->assertContainsOnlyInstancesOf(Schema::class, $this->document->getSchemas());
  }
}
