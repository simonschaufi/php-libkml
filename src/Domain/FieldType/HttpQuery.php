<?php

namespace LibKml\Domain\FieldType;

/**
 * Appends information to the query string, based on the parameters specified.
 *
 * @package LibKML\Domain\FieldType
 */
class HttpQuery {

  private $clientVersion;
  private $kmlVersion;
  private $clientName;
  private $language;

  public function getClientVersion() {
    return $this->clientVersion;
  }

  public function setClientVersion($clientVersion) {
    $this->clientVersion = $clientVersion;
  }

  public function getKmlVersion() {
    return $this->kmlVersion;
  }

  public function setKmlVersion($kmlVersion) {
    $this->kmlVersion = $kmlVersion;
  }

  public function getClientName() {
    return $this->clientName;
  }

  public function setClientName($clientName) {
    $this->clientName = $clientName;
  }

  public function getLanguage() {
    return $this->language;
  }

  public function setLanguage($language) {
    $this->language = $language;
  }

}
