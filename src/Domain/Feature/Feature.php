<?php

namespace LibKml\Domain\Feature;

use LibKml\Domain\FieldType\Atom\Author;
use LibKml\Domain\KmlObject;
use LibKml\Domain\Link\Link;
use LibKml\Domain\Region;

/**
 * Feature abstract class.
 */
abstract class Feature extends KmlObject {

  /**
   * @var string
   */
  protected $name;

  /**
   * @var bool
   */
  protected $visibility;

  /**
   * @var bool
   */
  protected $open;

  /**
   * @var Author
   */
  protected $author;

  /**
   * @var Link
   */
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

  public function addStyleSelector($styleSelector) {
    $this->styleSelector[] = $styleSelector;
  }

  public function clearStyleSelectors() {
    $this->styleSelector = array();
  }

  public function getAllStyles() {
    $all_styles = array();

    foreach ($this->styleSelector as $style) {
      $all_styles[] = $style;
    }

    return $all_styles;
  }

  public function getName() {
    return $this->name;
  }

  public function setName(string $name) {
    $this->name = $name;
  }

  public function getVisibility() {
    return $this->visibility;
  }

  public function setVisibility(bool $visibility) {
    $this->visibility = $visibility;
  }

  public function getOpen() {
    return $this->open;
  }

  public function setOpen(bool $open) {
    $this->open = $open;
  }

  public function getAuthor() {
    return $this->author;
  }

  public function setAuthor(Author $autor) {
    $this->author = $autor;
  }

  public function getAddress() {
    return $this->address;
  }

  public function setAddress($address) {
    $this->address = $address;
  }

  public function getAddressDetails() {
    return $this->addressDetails;
  }

  public function setAddressDetails($addressDetails) {
    $this->addressDetails = $addressDetails;
  }

  public function getPhoneNumber() {
    return $this->phoneNumber;
  }

  public function setPhoneNumber($phoneNumber) {
    $this->phoneNumber = $phoneNumber;
  }

  public function getSnippet() {
    return $this->snippet;
  }

  public function setSnippet($snippet) {
    $this->snippet = $snippet;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function getAbstractView() {
    return $this->abstractView;
  }

  public function setAbstractView($abstractView) {
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
