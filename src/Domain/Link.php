<?php

declare(strict_types=1);

namespace LibKml\Domain;

/**
 * Specifies the location of an external resource
 *
 * @see https://developers.google.com/kml/documentation/kmlreference#Link
 */
class Link extends KmlObject
{
    private ?string $href = null;
    private ?string $refreshMode = null;
    private ?float $refreshInterval = null;
    private string $viewRefreshMode = 'never';
    private ?float $viewRefreshTime = null;
    private ?float $viewBoundScale = null;
    private ?string $viewFormat = null;
    private ?string $httpQuery = null;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitLink($this);
    }

    public function getHref(): ?string
    {
        return $this->href;
    }

    public function setHref(?string $href): void
    {
        $this->href = $href;
    }

    public function getRefreshMode(): ?string
    {
        return $this->refreshMode;
    }

    public function setRefreshMode(?string $refreshMode): void
    {
        $this->refreshMode = $refreshMode;
    }

    public function getRefreshInterval(): ?float
    {
        return $this->refreshInterval;
    }

    public function setRefreshInterval(?float $refreshInterval): void
    {
        $this->refreshInterval = $refreshInterval;
    }

    public function getViewRefreshMode(): string
    {
        return $this->viewRefreshMode;
    }

    public function setViewRefreshMode(string $viewRefreshMode): void
    {
        $this->viewRefreshMode = $viewRefreshMode;
    }

    public function getViewRefreshTime(): ?float
    {
        return $this->viewRefreshTime;
    }

    public function setViewRefreshTime(?float $viewRefreshTime): void
    {
        $this->viewRefreshTime = $viewRefreshTime;
    }

    public function getViewBoundScale(): ?float
    {
        return $this->viewBoundScale;
    }

    public function setViewBoundScale(?float $viewBoundScale): void
    {
        $this->viewBoundScale = $viewBoundScale;
    }

    public function getViewFormat(): ?string
    {
        return $this->viewFormat;
    }

    public function setViewFormat(?string $viewFormat): void
    {
        $this->viewFormat = $viewFormat;
    }

    public function getHttpQuery(): ?string
    {
        return $this->httpQuery;
    }

    public function setHttpQuery(?string $httpQuery): void
    {
        $this->httpQuery = $httpQuery;
    }
}
