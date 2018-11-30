<?php

namespace LibKml\Domain\FieldType\Atom;

/**
 * Author class implements a xmlns:atom:author object.
 */
class Link {

  private $href;
  private $rel;
  private $type;
  private $hreflang;
  private $title;
  private $length;

  public function getHref() {
    return $this->href;
  }

  public function setHref(string $href) {
    $this->href = $href;
  }

  public function getRel() {
    return $this->rel;
  }

  public function setRel(string $rel) {
    $this->rel = $rel;
  }

  public function getType() {
    return $this->type;
  }

  public function setType(string $type) {
    $this->type = $type;
  }

  public function getHreflang() {
    return $this->hreflang;
  }

  public function setHreflang(string $hreflang) {
    $this->hreflang = $hreflang;
  }

  public function getTitle() {
    return $this->title;
  }

  public function setTitle(string $title) {
    $this->title = $title;
  }

  public function getLength() {
    return $this->length;
  }

  public function setLength(int $length) {
    $this->length = $length;
  }

}
