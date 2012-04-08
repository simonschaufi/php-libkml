<?php
namespace libKML;

/**
 *  Feature abstract class
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
  protected $styleSelector;
  protected $region;
  protected $extendedData;
  
  public abstract function toWKT();
  public abstract function toJSON();

  public function __toString() {
    $output = array();
    
    if (isset($this->name)) {
      $output[] = sprintf("\t<name>%s</name>", $this->name);
    }
    
    if (isset($this->visibility)) {
      $output[] = sprintf("\t<visibility>%s</visibility>", $this->visibility);
    }
    
    if (isset($this->open)) {
      $output[] = sprintf("\t<open>%s</open>", $this->open);
    }
    
    if (isset($this->author)) {
      $output[] = $this->autor->__toString();
    }
    
    if (isset($this->link)) {
      $output[] = $this->link->__toString();
    }
    
    if (isset($this->address)) {
      $output[] = sprintf("\t<address>%s</address>", $this->address);
    }
    
    if (isset($this->addressDetails)) {
      $output[] = $this->addressDetails->__toString();
    }
    
    if (isset($this->phoneNumber)) {
      $output[] = sprintf("\t<phoneNumber>%s</phoneNumber>", $this->phoneNumber);
    }
    
    if (isset($this->snippet)) {
      $output[] = sprintf("\t<Snippet>%s</Snippet>", $this->snippet);
    }
    
    if (isset($this->description)) {
      $output[] = sprintf("\t<description><![CDATA[%s]]></description>", $this->description);
    }
    
    if (isset($this->abstractView)) {
      $output[] = $this->abstractView->__toString();
    }
    
    if (isset($this->timePrimitive)) {
      $output[] = $this->timePrimitive->__toString();
    }
    
    if (isset($this->styleUrl)) {
      $output[] = sprintf("\t<styleUrl>%s</styleUrl>", $this->styleUrl);
    }
    
    if (isset($this->styleSelector)) {
      $output[] = $this->styleSelector->__toString();
    }
    
    if (isset($this->region)) {
      $output[] = $this->region->__toString();
    }
    
    if (isset($this->extendedData)) {
      $output[] = $this->extendedData->__toString();
    }
    
    return implode("\n", $output);
  }

  
  public function setName($name) {
    $this->name = $name;
  }
  
  public function getName() {
    return $this->name;
  }
  
  public function setVisibility($visibility) {
    $this->visibility = $visibility;
  }
  
  public function getVisibility() {
    return $this->visibility;
  }
  
  public function setOpen($open) {
    $this->open = $open;
  }
  
  public function getOpen() {
    return $this->open;
  }
  
  public function setAutor($autor) {
    $this->autor = $autor;
  }
  
  public function getAutor() {
    return $this->autor;
  }
  
  public function setAddress($address) {
    $this->address = $address;
  }
  
  public function getAddress() {
    return $this->address;
  }
  
  public function setAddressDetails($addressDetails) {
    $this->addressDetails = $addressDetails;
  }
  
  public function getAddressDetails() {
    return $this->addressDetails;
  }
  
  public function setPhoneNumber($phoneNumber) {
    $this->phoneNumber = $phoneNumber;
  }
  
  public function getPhoneNumber() {
    return $this->phoneNumber;
  }
  
  public function setSnippet($snippet) {
    $this->snippet = $snippet;
  }
  
  public function getSnippet() {
    return $this->snippet;
  }
  
  public function setDescription($description) {
    $this->description = $description;
  }
  
  public function getDescription() {
    return $this->description;
  }
  
  public function setAbstractView($abstractView) {
    $this->abstractView = $abstractView;
  }
  
  public function getAbstractView() {
    return $this->abstractView;
  }
  
  public function setTimePrimitive($timePrimitive) {
    $this->timePrimitive = $timePrimitive;
  }
  
  public function getTimePrimitive() {
    return $this->timePrimitive;
  }
  
  public function setStyleUrl($styleUrl) {
    $this->styleUrl = $styleUrl;
  }
  
  public function getStyleUrl() {
    return $this->styleUrl;
  }
  
  public function setStyleSelector($styleSelector) {
    $this->styleSelector = $styleSelector;
  }
  
  public function getStyleSelector() {
    return $this->styleSelector;
  }
  
  public function setRegion($region) {
    $this->region = $region;
  }
  
  public function getRegion() {
    return $this->region;
  }
  
  public function setExtendedData($extendedData) {
    $this->extendedData = $extendedData;
  }
  
  public function getExtendedData() {
    return $this->extendedData;
  }

}
?>