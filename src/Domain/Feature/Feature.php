<?php

declare(strict_types=1);

namespace LibKml\Domain\Feature;

use LibKml\Domain\AbstractView\AbstractView;
use LibKml\Domain\Feature\ExtendedData\ExtendedData;
use LibKml\Domain\FieldType\Atom\Author;
use LibKml\Domain\FieldType\Atom\Link;
use LibKml\Domain\KmlObject;
use LibKml\Domain\Region;
use LibKml\Domain\StyleSelector\StyleSelector;
use LibKml\Domain\TimePrimitive\TimePrimitive;

abstract class Feature extends KmlObject
{
    protected ?string $name = null;
    protected bool $visibility = true;
    protected bool $open = false;
    protected ?Author $atomAuthor = null;
    protected ?Link $atomLink = null;
    protected ?string $address = null;
    protected ?string $phoneNumber = null;
    protected ?string $snippet = null;
    protected ?string $description = null;
    protected ?AbstractView $abstractView = null;
    protected ?TimePrimitive $timePrimitive = null;
    protected ?string $styleUrl = null;
    protected array $styleSelectors = [];
    protected ?Region $region = null;
    protected ?ExtendedData $extendedData = null;

    public function addStyleSelector(StyleSelector $styleSelector): void
    {
        $this->styleSelectors[] = $styleSelector;
    }

    public function clearStyleSelectors(): void
    {
        $this->styleSelectors = [];
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getVisibility(): bool
    {
        return $this->visibility;
    }

    public function setVisibility(bool $visibility): void
    {
        $this->visibility = $visibility;
    }

    public function getOpen(): bool
    {
        return $this->open;
    }

    public function setOpen(bool $open): void
    {
        $this->open = $open;
    }

    public function getAtomAuthor(): ?Author
    {
        return $this->atomAuthor;
    }

    public function setAtomAuthor(?Author $autor): void
    {
        $this->atomAuthor = $autor;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    public function getAtomLink(): ?Link
    {
        return $this->atomLink;
    }

    public function setAtomLink(?Link $atomLink): void
    {
        $this->atomLink = $atomLink;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getSnippet(): ?string
    {
        return $this->snippet;
    }

    public function setSnippet(?string $snippet): void
    {
        $this->snippet = $snippet;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getAbstractView(): ?AbstractView
    {
        return $this->abstractView;
    }

    public function setAbstractView(?AbstractView $abstractView): void
    {
        $this->abstractView = $abstractView;
    }

    public function getTimePrimitive(): ?TimePrimitive
    {
        return $this->timePrimitive;
    }

    public function setTimePrimitive(?TimePrimitive $timePrimitive): void
    {
        $this->timePrimitive = $timePrimitive;
    }

    public function getStyleUrl(): ?string
    {
        return $this->styleUrl;
    }

    public function setStyleUrl(?string $styleUrl): void
    {
        $this->styleUrl = $styleUrl;
    }

    public function getStyleSelectors(): array
    {
        return $this->styleSelectors;
    }

    public function setStyleSelectors(array $styleSelectors): void
    {
        $this->styleSelectors = $styleSelectors;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): void
    {
        $this->region = $region;
    }

    public function getExtendedData(): ?ExtendedData
    {
        return $this->extendedData;
    }

    public function setExtendedData(?ExtendedData $extendedData): void
    {
        $this->extendedData = $extendedData;
    }
}
