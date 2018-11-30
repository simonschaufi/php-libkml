<?php

namespace LibKML\Domain\Link;

/**
 * NetworkLinkControl class.
 */
class NetworkLinkControl {

  private $minRefreshPeriod;
  private $maxSessionLength;
  private $cookie;
  private $message;
  private $linkName;
  private $linkDescription;
  private $linkSnippet;
  private $expires;
  private $update;
  private $abstractView;

  /**
   *
   */
  public function getCookie() {
    return $this->cookie;
  }

  /**
   *
   */
  public function setCookie($cookie) {
    $this->cookie = $cookie;
  }

  /**
   *
   */
  public function getMessage() {
    return $this->message;
  }

  /**
   *
   */
  public function setMessage($message) {
    $this->message = $message;
  }

  /**
   *
   */
  public function getLinkName() {
    return $this->linkName;
  }

  /**
   *
   */
  public function setLinkName($linkName) {
    $this->linkName = $linkName;
  }

  /**
   *
   */
  public function getLinkDescription() {
    return $this->linkDescription;
  }

  /**
   *
   */
  public function setLinkDescription($linkDescription) {
    $this->linkDescription = $linkDescription;
  }

  /**
   * @return mixed
   */
  public function getMinRefreshPeriod() {
    return $this->minRefreshPeriod;
  }

  /**
   * @param mixed $minRefreshPeriod
   */
  public function setMinRefreshPeriod($minRefreshPeriod) {
    $this->minRefreshPeriod = $minRefreshPeriod;
  }

  /**
   * @return mixed
   */
  public function getMaxSessionLength() {
    return $this->maxSessionLength;
  }

  /**
   * @param mixed $maxSessionLength
   */
  public function setMaxSessionLength($maxSessionLength) {
    $this->maxSessionLength = $maxSessionLength;
  }

  /**
   * @return mixed
   */
  public function getLinkSnippet() {
    return $this->linkSnippet;
  }

  /**
   * @param mixed $linkSnippet
   */
  public function setLinkSnippet($linkSnippet) {
    $this->linkSnippet = $linkSnippet;
  }

  /**
   * @return mixed
   */
  public function getExpires() {
    return $this->expires;
  }

  /**
   * @param mixed $expires
   */
  public function setExpires($expires) {
    $this->expires = $expires;
  }

  /**
   * @return mixed
   */
  public function getUpdate() {
    return $this->update;
  }

  /**
   * @param mixed $update
   */
  public function setUpdate($update) {
    $this->update = $update;
  }

  /**
   * @return mixed
   */
  public function getAbstractView() {
    return $this->abstractView;
  }

  /**
   * @param mixed $abstractView
   */
  public function setAbstractView($abstractView) {
    $this->abstractView = $abstractView;
  }

}
