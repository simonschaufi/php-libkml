<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType;

use LibKml\Domain\AbstractView\AbstractView;
use LibKml\Domain\Update;

/**
 * Controls the behavior of files fetched by a NetworkLink
 *
 * @see https://developers.google.com/kml/documentation/kmlreference#networklinkcontrol
 */
class NetworkLinkControl
{
    private ?float $minRefreshPeriod = 0.0;
    private ?float $maxSessionLength = -1.0;
    private ?string $cookie = null;
    private ?string $message = null;
    private ?string $linkName = null;
    private ?string $linkDescription = null;
    private ?string $linkSnippet = null;
    private ?string $expires = null;
    private ?Update $update = null;
    private ?AbstractView $abstractView = null;

    public function getCookie(): ?string
    {
        return $this->cookie;
    }

    public function setCookie(?string $cookie): void
    {
        $this->cookie = $cookie;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    public function getLinkName(): ?string
    {
        return $this->linkName;
    }

    public function setLinkName(?string $linkName): void
    {
        $this->linkName = $linkName;
    }

    public function getLinkDescription(): ?string
    {
        return $this->linkDescription;
    }

    public function setLinkDescription(?string $linkDescription): void
    {
        $this->linkDescription = $linkDescription;
    }

    public function getMinRefreshPeriod(): float
    {
        return $this->minRefreshPeriod;
    }

    public function setMinRefreshPeriod(float $minRefreshPeriod): void
    {
        $this->minRefreshPeriod = $minRefreshPeriod;
    }

    public function getMaxSessionLength(): float
    {
        return $this->maxSessionLength;
    }

    public function setMaxSessionLength(float $maxSessionLength): void
    {
        $this->maxSessionLength = $maxSessionLength;
    }

    public function getLinkSnippet(): ?string
    {
        return $this->linkSnippet;
    }

    public function setLinkSnippet(?string $linkSnippet): void
    {
        $this->linkSnippet = $linkSnippet;
    }

    public function getExpires(): ?string
    {
        return $this->expires;
    }

    public function setExpires(?string $expires): void
    {
        $this->expires = $expires;
    }

    public function getUpdate(): ?Update
    {
        return $this->update;
    }

    public function setUpdate(?Update $update): void
    {
        $this->update = $update;
    }

    public function getAbstractView(): ?AbstractView
    {
        return $this->abstractView;
    }

    public function setAbstractView(?AbstractView $abstractView): void
    {
        $this->abstractView = $abstractView;
    }
}
