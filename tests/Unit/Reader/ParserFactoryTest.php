<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader;

use LibKml\Reader\Kml\KmlParser;
use LibKml\Reader\ParserFactory;
use LibKml\UnsupportedFormat;
use PHPUnit\Framework\TestCase;

final class ParserFactoryTest extends TestCase
{
    private ParserFactory $parserFactory;

    protected function setUp(): void
    {
        $this->parserFactory = ParserFactory::getInstance();
    }

    public function testCreateKmlParser(): void
    {
        $parser = $this->parserFactory->getParser(ParserFactory::KML);

        self::assertInstanceOf(KmlParser::class, $parser);
    }

    public function testUnsupportedType(): void
    {
        $this->expectException(UnsupportedFormat::class);

        $this->parserFactory->getParser('unsupported');
    }
}
