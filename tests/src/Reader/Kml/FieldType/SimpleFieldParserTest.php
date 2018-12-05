<?php

namespace LibKml\Tests\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\SimpleField;
use LibKml\Reader\Kml\FieldType\SimpleFieldParser;
use PHPUnit\Framework\TestCase;

class SimpleFieldParserTest extends TestCase {

  const KML_SIMPLE_FIELDS = <<<'TAG'
<Schema name="TrailHeadType" id="TrailHeadTypeId">
  <SimpleField type="string" name="TrailHeadName">
    <displayName><![CDATA[<b>Trail Head Name</b>]]></displayName>
  </SimpleField>
  <SimpleField type="double" name="TrailLength">
    <displayName><![CDATA[<i>The length in miles</i>]]></displayName>
  </SimpleField>
</Schema>
TAG;

  public function testParseList() {
    $xmlElement = simplexml_load_string(self::KML_SIMPLE_FIELDS);

    $fields = SimpleFieldParser::parseList($xmlElement);

    $this->assertCount(2, $fields);
    $this->assertContainsOnlyInstancesOf(SimpleField::class, $fields);
  }

}
