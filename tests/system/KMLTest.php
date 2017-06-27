<?php

namespace tests\system\KML;

use KML\KML;
use PHPUnit\Framework\TestCase;

class KMLTest extends TestCase
{
    const SAMPLE_TIME_KML = __DIR__ . '/../data/sample-time.kml';
    const PARSE_TEST_KML = __DIR__ . '/../data/parse-test.kml';

    public function testCreateFromTextJson()
    {
        $kmlData = file_get_contents(self::PARSE_TEST_KML);

        $kml = KML::createFromText($kmlData);

        $this->assertInstanceOf(KML::class, $kml);
        $this->assertEquals(
            '{"type":"FeatureCollection","features":[{"type":"Feature","geometry":null}]}',
            json_encode($kml)
        );
    }

    public function testKmlParsing()
    {
        // Checking if the document was correctly parsed.
        $kmlData = file_get_contents(self::SAMPLE_TIME_KML);
        $kml = KML::createFromText($kmlData);
        $features = $kml->getAllFeatures();
        $this->assertNotEmpty($kml);
        $folder = $kml->getFeature();
        $this->assertNotEmpty($folder);
        $document = $folder->getFeatures()[0];
        $this->assertNotEmpty($folder);
        $placemarks = $document->getFeatures();
        $this->assertNotEmpty($placemarks);

        // Checking if the TimeStamp and TimeSpan are converted to xml correctly.
        foreach (['TimeStamp', 'TimeSpan'] as $i => $tag) {
            $str = $placemarks[$i]->__toString();
            $this->assertRegExp("/$tag/", $str);
        }
    }
}
