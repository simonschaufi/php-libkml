<?php

namespace LibKML\Domain\FieldType\Atom;

/**
 * Author class implements a xmlns:atom:author object.
 */
class Author {

  private $name;
  private $uri;
  private $email;

  /**
   *
   */
  public function __construct($name = NULL, $uri = NULL, $email = NULL) {
    $this->name = $name;
    $this->uri = $uri;
    $this->email = $email;
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
  public function getUri() {
    return $this->uri;
  }

  /**
   *
   */
  public function setUri($uri) {
    $this->uri = $uri;
  }

  /**
   *
   */
  public function getEmail() {
    return $this->email;
  }

  /**
   *
   */
  public function setEmail($email) {
    $this->email = $email;
  }

}
