<?php

declare(strict_types=1);

namespace LibKml\Domain;

use LibKml\Domain\FieldType\RefreshMode;
use LibKml\Domain\FieldType\ViewRefreshMode;

/**
 * Defines an image associated with an Icon style or overlay
 */
class Icon extends KmlObject
{
    private ?string $href = null;
    private ?string $refreshMode = RefreshMode::ON_CHANGE;
    private float $refreshInterval = 4.0;
    private string $viewRefreshMode = ViewRefreshMode::NEVER;
    private float $viewRefreshTime = 4.0;
    private float $viewBoundScale = 1.0;
    private ?string $viewFormat = null;
    private ?string $httpQuery = null;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitIcon($this);
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

    public function getRefreshInterval(): float
    {
        return $this->refreshInterval;
    }

    /**
     * Indicates to refresh the file every $refreshInterval seconds.
     */
    public function setRefreshInterval(float $refreshInterval): void
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

    public function getViewRefreshTime(): float
    {
        return $this->viewRefreshTime;
    }

    public function setViewRefreshTime(float $viewRefreshTime): void
    {
        $this->viewRefreshTime = $viewRefreshTime;
    }

    public function getViewBoundScale(): float
    {
        return $this->viewBoundScale;
    }

    public function setViewBoundScale(float $viewBoundScale): void
    {
        $this->viewBoundScale = $viewBoundScale;
    }

    public function getViewFormat(): ?string
    {
        return $this->viewFormat;
    }

    public function setViewFormat(string $viewFormat): void
    {
        $this->viewFormat = $viewFormat;
    }

    public function getHttpQuery(): ?string
    {
        return $this->httpQuery;
    }

    public function setHttpQuery(string $httpQuery): void
    {
        $this->httpQuery = $httpQuery;
    }
}
