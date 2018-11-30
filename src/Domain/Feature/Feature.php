<?php

namespace LibKML\Domain\Feature;

use LibKML\Domain\KMLObject;
use LibKml\Region;

/**
 * Feature abstract class.
 */
abstract class Feature extends KMLObject {

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
  protected $styleSelector = array();
  protected $region;
  protected $extendedData;

  /**
   *
   */
  abstract public function getAllFeatures();

  /**
   *
   */
  public function addStyleSelector($styleSelector) {
    $this->styleSelector[] = $styleSelector;
  }

  /**
   *
   */
  public function clearStyleSelectors() {
    $this->styleSelector = array();
  }

  /**
   *
   */
  public function getAllStyles() {
    $all_styles = array();

    foreach ($this->styleSelector as $style) {
      $all_styles[] = $style;
    }

    return $all_styles;
  }

  /**
   *
   */
  public function getName() {
    return $this->name;
  }

  /**
   *
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   *
   */
  public function getVisibility() {
    return $this->visibility;
  }

  /**
   *
   */
  public function setVisibility($visibility) {
    $this->visibility = $visibility;
  }

  /**
   *
   */
  public function getOpen() {
    return $this->open;
  }

  /**
   *
   */
  public function setOpen($open) {
    $this->open = $open;
  }

  /**
   *
   */
  public function setAuthor($autor) {
    $this->author = $autor;
  }

  /**
   *
   */
  public function getAuthor() {
    return $this->author;
  }

  /**
   *
   */
  public function getAddress() {
    return $this->address;
  }

  /**
   *
   */
  public function setAddress($address) {
    $this->address = $address;
  }

  /**
   *
   */
  public function getAddressDetails() {
    return $this->addressDetails;
  }

  /**
   *
   */
  public function setAddressDetails($addressDetails) {
    $this->addressDetails = $addressDetails;
  }

  /**
   *
   */
  public function getPhoneNumber() {
    return $this->phoneNumber;
  }

  /**
   *
   */
  public function setPhoneNumber($phoneNumber) {
    $this->phoneNumber = $phoneNumber;
  }

  /**
   *
   */
  public function getSnippet() {
    return $this->snippet;
  }

  /**
   *
   */
  public function setSnippet($snippet) {
    $this->snippet = $snippet;
  }

  /**
   *
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   *
   */
  public function setDescription($description) {
    $this->description = $description;
  }

  /**
   *
   */
  public function getAbstractView() {
    return $this->abstractView;
  }

  /**
   *
   */
  public function setAbstractView($abstractView) {
    $this->abstractView = $abstractView;
  }

  /**
   *
   */
  public function getTimePrimitive() {
    return $this->timePrimitive;
  }

  /**
   *
   */
  public function setTimePrimitive($timePrimitive) {
    $this->timePrimitive = $timePrimitive;
  }

  /**
   *
   */
  public function getStyleUrl() {
    return $this->styleUrl;
  }

  /**
   *
   */
  public function setStyleUrl($styleUrl) {
    $this->styleUrl = $styleUrl;
  }

  /**
   *
   */
  public function getStyleSelector() {
    return $this->styleSelector;
  }

  /**
   *
   */
  public function setStyleSelector(array $styleSelector) {
    $this->styleSelector = $styleSelector;
  }

  /**
   *
   */
  public function getRegion() {
    return $this->region;
  }

  /**
   *
   */
  public function setRegion(Region $region) {
    $this->region = $region;
  }

  /**
   *
   */
  public function getExtendedData() {
    return $this->extendedData;
  }

  /**
   *
   */
  public function setExtendedData($extendedData) {
    $this->extendedData = $extendedData;
  }

}
