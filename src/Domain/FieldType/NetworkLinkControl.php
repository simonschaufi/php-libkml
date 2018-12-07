<?php

namespace LibKml\Domain\FieldType;

use LibKml\Domain\AbstractView\AbstractView;
use LibKml\Domain\Update;

/**
 * Controls the behavior of files fetched by a NetworkLink.
 */
class NetworkLinkControl {

  private $minRefreshPeriod = 0;
  private $maxSessionLength = -1;
  private $cookie;
  private $message;
  private $linkName;
  private $linkDescription;
  private $linkSnippet;
  private $expires;
  private $update;
  private $abstractView;

  public function getCookie(): string {
    return $this->cookie;
  }

  public function setCookie(string $cookie): void {
    $this->cookie = $cookie;
  }

  public function getMessage(): string {
    return $this->message;
  }

  public function setMessage(string $message): void {
    $this->message = $message;
  }

  public function getLinkName(): string {
    return $this->linkName;
  }

  public function setLinkName(string $linkName): void {
    $this->linkName = $linkName;
  }

  public function getLinkDescription(): string {
    return $this->linkDescription;
  }

  public function setLinkDescription(string $linkDescription): void {
    $this->linkDescription = $linkDescription;
  }

  public function getMinRefreshPeriod(): float {
    return $this->minRefreshPeriod;
  }

  public function setMinRefreshPeriod(float $minRefreshPeriod): void {
    $this->minRefreshPeriod = $minRefreshPeriod;
  }

  public function getMaxSessionLength(): float {
    return $this->maxSessionLength;
  }

  public function setMaxSessionLength(float $maxSessionLength): void {
    $this->maxSessionLength = $maxSessionLength;
  }

  public function getLinkSnippet(): string {
    return $this->linkSnippet;
  }

  public function setLinkSnippet(string $linkSnippet): void {
    $this->linkSnippet = $linkSnippet;
  }

  public function getExpires(): int {
    return $this->expires;
  }

  public function setExpires(int $expires): void {
    $this->expires = $expires;
  }

  public function getUpdate(): Update {
    return $this->update;
  }

  public function setUpdate(Update $update): void {
    $this->update = $update;
  }

  public function getAbstractView(): AbstractView {
    return $this->abstractView;
  }

  public function setAbstractView(AbstractView $abstractView): void {
    $this->abstractView = $abstractView;
  }

}
