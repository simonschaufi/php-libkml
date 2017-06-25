<?php

namespace tests\system\KML;

use KML\KML;
use PHPUnit\Framework\TestCase;

class KMLTest extends TestCase
{
    public function testCreateFromTextJson()
    {
        $text = file_get_contents(dirname(__FILE__, 2) . '/data/parse-test.kml');

        $kml = KML::createFromText($text);

        $this->assertInstanceOf(KML::class, $kml);
        $this->assertEquals(
            '{"type":"FeatureCollection","features":[{"type":"Feature","geometry":null}]}',
            json_encode($kml)
        );
    }
}
