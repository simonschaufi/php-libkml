<?php

namespace LibKML\Domain\FieldType;

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

  /**
   * @return string
   */
  public function getClientVersion() {
    return $this->clientVersion;
  }

  /**
   * @param string $clientVersion
   */
  public function setClientVersion($clientVersion) {
    $this->clientVersion = $clientVersion;
  }

  /**
   * @return string
   */
  public function getKmlVersion() {
    return $this->kmlVersion;
  }

  /**
   * @param string $kmlVersion
   */
  public function setKmlVersion($kmlVersion) {
    $this->kmlVersion = $kmlVersion;
  }

  /**
   * @return string
   */
  public function getClientName() {
    return $this->clientName;
  }

  /**
   * @param string $clientName
   */
  public function setClientName($clientName) {
    $this->clientName = $clientName;
  }

  /**
   * @return string
   */
  public function getLanguage() {
    return $this->language;
  }

  /**
   * @param string $language
   */
  public function setLanguage($language) {
    $this->language = $language;
  }

}
