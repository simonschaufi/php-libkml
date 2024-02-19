<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\StyleSelector;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\StyleSelector\Pair;
use LibKml\Domain\StyleSelector\StyleMap;
use PHPUnit\Framework\TestCase;

final class StyleMapTest extends TestCase
{
    /**
     * @var StyleMap
     */
    protected $styleMap;

    protected function setUp(): void
    {
        $this->styleMap = new StyleMap();
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitStyleMap')
          ->with(self::equalTo($this->styleMap));

        $this->styleMap->accept($objectVisitor);
    }

    public function testPairsField(): void
    {
        $pair1 = new Pair();
        $pair2 = new Pair();
        $pairs = [$pair1, $pair2];

        $this->styleMap->setPairs($pairs);

        self::assertCount(2, $this->styleMap->getPairs());
        self::assertContains($pair1, $this->styleMap->getPairs());
        self::assertContains($pair2, $this->styleMap->getPairs());
    }

    public function testAddPair(): void
    {
        $pair = new Pair();

        $this->styleMap->addPair($pair);

        self::assertCount(1, $this->styleMap->getPairs());
        self::assertContains($pair, $this->styleMap->getPairs());
    }

    public function testClearPair(): void
    {
        $pair1 = new Pair();
        $pair2 = new Pair();
        $this->styleMap->setPairs([$pair1, $pair2]);

        $this->styleMap->clearPairs();

        self::assertEmpty($this->styleMap->getPairs());
    }
}
