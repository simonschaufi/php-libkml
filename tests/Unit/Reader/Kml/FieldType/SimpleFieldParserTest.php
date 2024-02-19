<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\SimpleField;
use LibKml\Reader\Kml\FieldType\SimpleFieldParser;
use PHPUnit\Framework\TestCase;

final class SimpleFieldParserTest extends TestCase
{
    private const KML_SIMPLE_FIELDS = <<<'TAG'
<Schema name="TrailHeadType" id="TrailHeadTypeId">
  <SimpleField type="string" name="TrailHeadName">
    <displayName><![CDATA[<b>Trail Head Name</b>]]></displayName>
  </SimpleField>
  <SimpleField type="double" name="TrailLength">
    <displayName><![CDATA[<i>The length in miles</i>]]></displayName>
  </SimpleField>
</Schema>
TAG;

    public function testParseList(): void
    {
        $xmlElement = simplexml_load_string(self::KML_SIMPLE_FIELDS);

        $fields = SimpleFieldParser::parseList($xmlElement);

        self::assertCount(2, $fields);
        self::assertContainsOnlyInstancesOf(SimpleField::class, $fields);
    }
}
