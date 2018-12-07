<?php

namespace LibKml\Tests\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Schema;
use LibKml\Reader\Kml\FieldType\SchemaParser;
use PHPUnit\Framework\TestCase;

class SchemaParserTest extends TestCase {

  const KML_SCHEMA = <<<'TAG'
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
TAG;

  const KML_MULTIPLE_SCHEMAS = <<<'TAG'
<Document>
  <Schema name="TrailHeadType" id="TrailHeadTypeId">
    <SimpleField type="string" name="TrailHeadName">
      <displayName><![CDATA[<b>Trail Head Name</b>]]></displayName>
    </SimpleField>
    <SimpleField type="double" name="TrailLength">
      <displayName><![CDATA[<i>The length in miles</i>]]></displayName>
    </SimpleField>
  </Schema>
  <Schema name="Elevation" id="ElevationTypeId">
    <SimpleField type="int" name="ElevationGain">
      <displayName><![CDATA[<i>change in altitude</i>]]></displayName>
    </SimpleField>
  </Schema>
</Document> 
TAG;

  public function testParse() {
    $xmlElement = simplexml_load_string(self::KML_SCHEMA);

    $schema = SchemaParser::parse($xmlElement);

    $this->assertInstanceOf(Schema::class, $schema);
    $this->assertCount(3, $schema->getFields());
    $this->assertEquals('TrailHeadTypeId', $schema->getId());
    $this->assertEquals('TrailHeadType', $schema->getName());
  }

  public function testParseList() {
    $xmlElement = simplexml_load_string(self::KML_MULTIPLE_SCHEMAS);

    $schemas = SchemaParser::parseList($xmlElement);

    $this->assertCount(2, $schemas);
    $this->assertContainsOnlyInstancesOf(Schema::class, $schemas);
  }

}
