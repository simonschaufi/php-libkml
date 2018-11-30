<?php

namespace LibKml\Domain\FieldType\Atom;

/**
 * Author class implements a xmlns:atom:author object.
 */
class Author {

  private $name;
  private $uri;
  private $email;

  public function getName() {
    return $this->name;
  }

  public function setName(string $name) {
    $this->name = $name;
  }

  public function getUri() {
    return $this->uri;
  }

  public function setUri(string $uri) {
    $this->uri = $uri;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail(string $email) {
    $this->email = $email;
  }

}
