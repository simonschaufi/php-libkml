<?php

namespace LibKml\Tests\Reader;

use LibKml\Reader\Kml\KmlParser;
use LibKml\UnsupportedFormat;
use LibKml\Reader\ParserFactory;
use PHPUnit\Framework\TestCase;

class ParserFactoryTest extends TestCase {

  /**
   * @var ParserFactory
   */
  protected $parserFactory;

  public function setUp() {
    $this->parserFactory = ParserFactory::getInstance();
  }

  public function testCreateKmlParser() {
    $parser = $this->parserFactory->getParser(ParserFactory::KML);

    $this->assertInstanceOf(KmlParser::class, $parser);
  }

  public function testUnsupportedType() {
    $this->expectException(UnsupportedFormat::class);

    $this->parserFactory->getParser("unsupported");
  }

}
