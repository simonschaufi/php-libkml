<?php

namespace LibKml\Domain\Feature;

use LibKml\Domain\AbstractView\AbstractView;
use LibKml\Domain\FieldType\Atom\Author;
use LibKml\Domain\KmlObject;
use LibKml\Domain\Link\Link;
use LibKml\Domain\Region;
use LibKml\Domain\StyleSelector\StyleSelector;

/**
 * Feature abstract class.
 */
abstract class Feature extends KmlObject {

  protected $name;
  protected $visibility;
  protected $open;
  protected $author;
  protected $link;
  protected $address;
  protected $addressDetails;
  protected $phoneNumber;
  protected $snippet;
  protected $description;
  protected $abstractView;
  protected $timePrimitive;
  protected $styleUrl;
  protected $styleSelector = [];
  protected $region;
  protected $extendedData;

  public function addStyleSelector(StyleSelector $styleSelector): void {
    $this->styleSelector[] = $styleSelector;
  }

  public function clearStyleSelectors(): void {
    $this->styleSelector = array();
  }

  public function getAllStyles(): array {
    $all_styles = array();

    foreach ($this->styleSelector as $style) {
      $all_styles[] = $style;
    }

    return $all_styles;
  }

  public function getName(): string {
    return $this->name;
  }

  public function setName(string $name) {
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

  public function getAuthor(): Author {
    return $this->author;
  }

  public function setAuthor(Author $autor): void {
    $this->author = $autor;
  }

  public function getAddress(): string {
    return $this->address;
  }

  public function setAddress(string $address) {
    $this->address = $address;
  }

  public function getLink(): Link {
    return $this->link;
  }

  public function setLink(Link $link): void {
    $this->link = $link;
  }

  public function getAddressDetails() {
    return $this->addressDetails;
  }

  public function setAddressDetails($addressDetails) {
    $this->addressDetails = $addressDetails;
  }

  public function getPhoneNumber(): string {
    return $this->phoneNumber;
  }

  public function setPhoneNumber(string $phoneNumber) {
    $this->phoneNumber = $phoneNumber;
  }

  public function getSnippet(): string {
    return $this->snippet;
  }

  public function setSnippet(string $snippet) {
    $this->snippet = $snippet;
  }

  public function getDescription(): string {
    return $this->description;
  }

  public function setDescription(string $description) {
    $this->description = $description;
  }

  public function getAbstractView(): AbstractView {
    return $this->abstractView;
  }

  public function setAbstractView(AbstractView $abstractView) {
    $this->abstractView = $abstractView;
  }

  public function getTimePrimitive() {
    return $this->timePrimitive;
  }

  public function setTimePrimitive($timePrimitive) {
    $this->timePrimitive = $timePrimitive;
  }

  public function getStyleUrl() {
    return $this->styleUrl;
  }

  public function setStyleUrl($styleUrl) {
    $this->styleUrl = $styleUrl;
  }

  public function getStyleSelector() {
    return $this->styleSelector;
  }

  public function setStyleSelector(array $styleSelector) {
    $this->styleSelector = $styleSelector;
  }

  public function getRegion() {
    return $this->region;
  }

  public function setRegion(Region $region) {
    $this->region = $region;
  }

  public function getExtendedData() {
    return $this->extendedData;
  }

  public function setExtendedData($extendedData) {
    $this->extendedData = $extendedData;
  }

}
