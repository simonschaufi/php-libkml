<?php

require __DIR__ . '/../libkml.php';

class TimePrimitiveTest extends PHPUnit_Framework_TestCase
{

  const SAMPLE_KML = __DIR__ . '/sample-time.kml';

  public function testKmlParsing()
  {
    // Checking if the document was correctly parsed.
    $kml_data = file_get_contents(self::SAMPLE_KML);
    $kml = KML::createFromText($kml_data);
    $features = $kml->getAllFeatures();
    $this->assertNotEmpty($kml);
    $folder = $kml->getFeature();
    $this->assertNotEmpty($folder);
    $document = $folder->getFeatures()[0];
    $this->assertNotEmpty($folder);
    $placemarks = $document->getFeatures();
    $this->assertNotEmpty($placemarks);

    // Checking if the TimeStamp and TimeSpan are converted to xml correctly.
    foreach(array('TimeStamp', 'TimeSpan') as $i => $tag) {
      $str = $placemarks[$i]->__toString();
      $this->assertRegExp("/$tag/", $str);
    }
  }
}
