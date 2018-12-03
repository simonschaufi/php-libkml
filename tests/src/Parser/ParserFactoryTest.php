<?php

namespace LibKml\Tests\Parser;

use LibKml\Parser\Kml\KmlParser;
use LibKml\Parser\ParserFactory;
use LibKml\Parser\UnsupportedFormat;
use PHPUnit\Framework\TestCase;

class ParserFactoryTest extends TestCase {

  /**
   * @var ParserFactory
   */
  protected $parserFactory;

  public function setUp() {
    $this->parserFactory = new ParserFactory();
  }

  public function testCreateKmlParser() {
    $parser = $this->parserFactory->getParser(ParserFactory::KML_STRING);

    $this->assertInstanceOf(KmlParser::class, $parser);
  }

  public function testUnsupportedType() {
    $this->expectException(UnsupportedFormat::class);

    $this->parserFactory->getParser("unsupported");
  }

}
