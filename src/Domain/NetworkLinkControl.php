<?php

namespace LibKml\Domain\Link;

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

  public function getCookie() {
    return $this->cookie;
  }

  public function setCookie($cookie) {
    $this->cookie = $cookie;
  }

  public function getMessage() {
    return $this->message;
  }

  public function setMessage($message) {
    $this->message = $message;
  }

  public function getLinkName() {
    return $this->linkName;
  }

  public function setLinkName($linkName) {
    $this->linkName = $linkName;
  }

  public function getLinkDescription() {
    return $this->linkDescription;
  }

  public function setLinkDescription($linkDescription) {
    $this->linkDescription = $linkDescription;
  }

  public function getMinRefreshPeriod() {
    return $this->minRefreshPeriod;
  }

  public function setMinRefreshPeriod($minRefreshPeriod) {
    $this->minRefreshPeriod = $minRefreshPeriod;
  }

  public function getMaxSessionLength() {
    return $this->maxSessionLength;
  }

  public function setMaxSessionLength($maxSessionLength) {
    $this->maxSessionLength = $maxSessionLength;
  }

  public function getLinkSnippet() {
    return $this->linkSnippet;
  }

  public function setLinkSnippet($linkSnippet) {
    $this->linkSnippet = $linkSnippet;
  }

  public function getExpires() {
    return $this->expires;
  }

  public function setExpires($expires) {
    $this->expires = $expires;
  }

  public function getUpdate() {
    return $this->update;
  }

  public function setUpdate($update) {
    $this->update = $update;
  }

  public function getAbstractView() {
    return $this->abstractView;
  }

  public function setAbstractView($abstractView) {
    $this->abstractView = $abstractView;
  }

}
