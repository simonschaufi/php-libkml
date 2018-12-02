<?php

namespace LibKml\Tests\Parser;

use LibKml\Parser\Kml\KmlParser;
use LibKml\Parser\ParserFactory;
use LibKml\Parser\UnsupportedFormat;
use PHPUnit\Framework\TestCase;

class ParserFactoryTest extends TestCase {

  public function testCreateKmlParser() {
    $parser = ParserFactory::create(ParserFactory::KML_STRING);

    $this->assertInstanceOf(KmlParser::class, $parser);
  }

  public function testUnsupportedType() {
    $this->expectException(UnsupportedFormat::class);

    ParserFactory::create("unsupported");
  }

}
