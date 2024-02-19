<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Alias;
use LibKml\Reader\Kml\FieldType\ResourceMapParser;
use PHPUnit\Framework\TestCase;

final class ResourceMapParserTest extends TestCase
{
    public const KML_RESOURCE_MAP = <<<'TAG'
<ResourceMap>
  <Alias>
    <targetHref>../files/CU-Macky---Center-StairsnoCulling.jpg</targetHref>
    <sourceHref>CU-Macky---Center-StairsnoCulling.jpg</sourceHref>
  </Alias>
  <Alias>
    <targetHref>../files/CU-Macky-4sideturretnoCulling.jpg</targetHref>
    <sourceHref>CU-Macky-4sideturretnoCulling.jpg</sourceHref>
  </Alias>
  <Alias>
    <targetHref>../files/CU-Macky-Back-NorthnoCulling.jpg</targetHref>
    <sourceHref>CU-Macky-Back-NorthnoCulling.jpg</sourceHref>
  </Alias>
</ResourceMap>
TAG;

    public function testParse(): void
    {
        $element = simplexml_load_string(self::KML_RESOURCE_MAP);

        $resourceMap = ResourceMapParser::parse($element);

        self::assertCount(3, $resourceMap->getAliases());
        self::assertContainsOnlyInstancesOf(Alias::class, $resourceMap->getAliases());
    }
}
