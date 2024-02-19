<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature;

use LibKml\Domain\AbstractView\AbstractView;
use LibKml\Domain\Feature\ExtendedData\ExtendedData;
use LibKml\Domain\Feature\Feature;
use LibKml\Domain\FieldType\Atom\Author;
use LibKml\Domain\FieldType\Atom\Link;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\Region;
use LibKml\Domain\StyleSelector\StyleSelector;
use LibKml\Domain\TimePrimitive\TimePrimitive;
use PHPUnit\Framework\TestCase;

final class FeatureTest extends TestCase
{
    /**
     * @var Feature
     */
    protected $feature;

    protected function setUp(): void
    {
        $this->feature = new class() extends Feature {
            public function accept(KmlObjectVisitorInterface $visitor): void {}
        };
    }

    public function testNameField(): void
    {
        $name = 'London Bridge';

        $this->feature->setName($name);

        self::assertEquals($name, $this->feature->getName());
    }

    public function testVisibilityField(): void
    {
        $visibility = true;

        $this->feature->setVisibility($visibility);

        self::assertEquals($visibility, $this->feature->getVisibility());
    }

    public function testOpenField(): void
    {
        $open = true;

        $this->feature->setOpen($open);

        self::assertEquals($open, $this->feature->getOpen());
    }

    public function testAtomAuthorField(): void
    {
        $author = new Author();
        $author->setName('John Smith');

        $this->feature->setAtomAuthor($author);

        self::assertEquals($author, $this->feature->getAtomAuthor());
    }

    public function testAddressField(): void
    {
        $address = 'Blackfriards 240';

        $this->feature->setAddress($address);

        self::assertEquals($address, $this->feature->getAddress());
    }

    public function testAtomLinkField(): void
    {
        $link = new Link();

        $this->feature->setAtomLink($link);

        self::assertEquals($link, $this->feature->getAtomLink());
    }

    public function testPhoneNumberField(): void
    {
        $phoneNumber = 'tel:+449999999999';

        $this->feature->setPhoneNumber($phoneNumber);

        self::assertEquals($phoneNumber, $this->feature->getPhoneNumber());
    }

    public function testSnippetField(): void
    {
        $snippet = 'London Bridge';

        $this->feature->setSnippet($snippet);

        self::assertEquals($snippet, $this->feature->getSnippet());
    }

    public function testDescriptionField(): void
    {
        $description = 'London Bridge';

        $this->feature->setDescription($description);

        self::assertEquals($description, $this->feature->getDescription());
    }

    public function testAbstractViewField(): void
    {
        $abstractView = new class() extends AbstractView {
            public function accept(KmlObjectVisitorInterface $visitor): void {}
        };

        $this->feature->setView($abstractView);

        self::assertEquals($abstractView, $this->feature->getView());
    }

    public function testTimePrimitiveField(): void
    {
        $timePrimitive = new class() extends TimePrimitive {
            public function accept(KmlObjectVisitorInterface $visitor): void {}
        };

        $this->feature->setTimePrimitive($timePrimitive);

        self::assertEquals($timePrimitive, $this->feature->getTimePrimitive());
    }

    public function testStyleUrlField(): void
    {
        $styleUrl = 'http://someserver.com/somestylefile.xml#restaurant';

        $this->feature->setStyleUrl($styleUrl);

        self::assertEquals($styleUrl, $this->feature->getStyleUrl());
    }

    public function testStyleSelectorField(): void
    {
        $styleSelector1 = new class() extends StyleSelector {
            public function accept(KmlObjectVisitorInterface $visitor): void {}
        };

        $styleSelector2 = new class() extends StyleSelector {
            public function accept(KmlObjectVisitorInterface $visitor): void {}
        };

        $styleSelectors = [$styleSelector1, $styleSelector2];

        $this->feature->setStyleSelectors($styleSelectors);

        self::assertCount(2, $this->feature->getStyleSelectors());
        self::assertContains($styleSelector1, $this->feature->getStyleSelectors());
        self::assertContains($styleSelector2, $this->feature->getStyleSelectors());
    }

    public function testAddStyleSelector(): void
    {
        $styleSelector = new class() extends StyleSelector {
            public function accept(KmlObjectVisitorInterface $visitor): void {}
        };
        $initial = count($this->feature->getStyleSelectors());

        $this->feature->addStyleSelector($styleSelector);

        self::assertContains($styleSelector, $this->feature->getStyleSelectors());
        self::assertCount($initial + 1, $this->feature->getStyleSelectors());
    }

    public function testClearStyleSelector(): void
    {
        $styleSelector1 = new class() extends StyleSelector {
            public function accept(KmlObjectVisitorInterface $visitor): void {}
        };
        $styleSelector2 = new class() extends StyleSelector {
            public function accept(KmlObjectVisitorInterface $visitor): void {}
        };
        $styleSelector = [$styleSelector1, $styleSelector2];

        $this->feature->setStyleSelectors($styleSelector);

        $this->feature->clearStyleSelectors();

        self::assertCount(0, $this->feature->getStyleSelectors());
    }

    public function testRegionField(): void
    {
        $region = new Region();

        $this->feature->setRegion($region);

        self::assertEquals($region, $this->feature->getRegion());
    }

    public function testExtendedDataField(): void
    {
        $extendedData = new ExtendedData();

        $this->feature->setExtendedData($extendedData);

        self::assertEquals($extendedData, $this->feature->getExtendedData());
    }
}
