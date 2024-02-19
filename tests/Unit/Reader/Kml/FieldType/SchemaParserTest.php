<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Schema;
use LibKml\Reader\Kml\FieldType\SchemaParser;
use PHPUnit\Framework\TestCase;

final class SchemaParserTest extends TestCase
{
    public const KML_SCHEMA = <<<'TAG'
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

    public const KML_MULTIPLE_SCHEMAS = <<<'TAG'
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

    public function testParse(): void
    {
        $xmlElement = simplexml_load_string(self::KML_SCHEMA);

        $schema = SchemaParser::parse($xmlElement);

        self::assertInstanceOf(Schema::class, $schema);
        self::assertCount(3, $schema->getFields());
        self::assertEquals('TrailHeadTypeId', $schema->getId());
        self::assertEquals('TrailHeadType', $schema->getName());
    }

    public function testParseList(): void
    {
        $xmlElement = simplexml_load_string(self::KML_MULTIPLE_SCHEMAS);

        $schemas = SchemaParser::parseList($xmlElement);

        self::assertCount(2, $schemas);
        self::assertContainsOnlyInstancesOf(Schema::class, $schemas);
    }
}
