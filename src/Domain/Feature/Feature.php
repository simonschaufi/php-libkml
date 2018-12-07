<?php

namespace LibKml\Domain\Feature;

use LibKml\Domain\AbstractView\AbstractView;
use LibKml\Domain\Feature\ExtendedData\ExtendedData;
use LibKml\Domain\FieldType\Atom\Author;
use LibKml\Domain\KmlObject;
use LibKml\Domain\FieldType\Atom\Link;
use LibKml\Domain\Region;
use LibKml\Domain\StyleSelector\StyleSelector;
use LibKml\Domain\TimePrimitive\TimePrimitive;

/**
 * Feature abstract class.
 */
abstract class Feature extends KmlObject {

  protected $name;
  protected $visibility = TRUE;
  protected $open = FALSE;
  protected $atomAuthor;
  protected $atomLink;
  protected $address;
  protected $addressDetails;
  protected $phoneNumber;
  protected $snippet;
  protected $description;
  protected $view;
  protected $timePrimitive;
  protected $styleUrl;
  protected $styleSelectors = [];
  protected $region;
  protected $extendedData;

  public function addStyleSelector(StyleSelector $styleSelector): void {
    $this->styleSelectors[] = $styleSelector;
  }

  public function clearStyleSelectors(): void {
    $this->styleSelectors = array();
  }

  public function getName(): ?string {
    return $this->name;
  }

  public function setName(?string $name): void {
    $this->name = $name;
  }

  public function getVisibility(): bool {
    return $this->visibility;
  }

  public function setVisibility(bool $visibility) {
    $this->visibility = $visibility;
  }

  public function getOpen(): bool {
    return $this->open;
  }

  public function setOpen(bool $open) {
    $this->open = $open;
  }

  public function getAtomAuthor(): ?Author {
    return $this->atomAuthor;
  }

  public function setAtomAuthor(?Author $autor): void {
    $this->atomAuthor = $autor;
  }

  public function getAddress(): ?string {
    return $this->address;
  }

  public function setAddress(?string $address) {
    $this->address = $address;
  }

  public function getAtomLink(): ?Link {
    return $this->atomLink;
  }

  public function setAtomLink(?Link $atomLink): void {
    $this->atomLink = $atomLink;
  }

  public function getAddressDetails() {
    return $this->addressDetails;
  }

  public function setAddressDetails($addressDetails) {
    $this->addressDetails = $addressDetails;
  }

  public function getPhoneNumber(): ?string {
    return $this->phoneNumber;
  }

  public function setPhoneNumber(?string $phoneNumber): void {
    $this->phoneNumber = $phoneNumber;
  }

  public function getSnippet(): ?string {
    return $this->snippet;
  }

  public function setSnippet(?string $snippet): void {
    $this->snippet = $snippet;
  }

  public function getDescription(): ?string {
    return $this->description;
  }

  public function setDescription(?string $description): void {
    $this->description = $description;
  }

  public function getView(): ?AbstractView {
    return $this->view;
  }

  public function setView(?AbstractView $view): void {
    $this->view = $view;
  }

  public function getTimePrimitive(): ?TimePrimitive {
    return $this->timePrimitive;
  }

  public function setTimePrimitive(?TimePrimitive $timePrimitive): void {
    $this->timePrimitive = $timePrimitive;
  }

  public function getStyleUrl(): ?string {
    return $this->styleUrl;
  }

  public function setStyleUrl(?string $styleUrl): void {
    $this->styleUrl = $styleUrl;
  }

  public function getStyleSelectors(): array {
    return $this->styleSelectors;
  }

  public function setStyleSelectors(array $styleSelectors): void {
    $this->styleSelectors = $styleSelectors;
  }

  public function getRegion(): ?Region {
    return $this->region;
  }

  public function setRegion(?Region $region): void {
    $this->region = $region;
  }

  public function getExtendedData(): ?ExtendedData {
    return $this->extendedData;
  }

  public function setExtendedData(?ExtendedData $extendedData): void {
    $this->extendedData = $extendedData;
  }

}
