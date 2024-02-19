<?php

declare(strict_types=1);

namespace LibKml\Domain\Feature\Overlay;

/**
 * Defines how much of an scene is visible.
 */
class ViewVolume
{
    private ?float $leftFov = null;
    private ?float $rightFov = null;
    private ?float $bottomFov = null;
    private ?float $topFov = null;
    private ?float $near = null;

    public function getLeftFov(): float
    {
        return $this->leftFov;
    }

    public function setLeftFov(float $leftFov): void
    {
        $this->leftFov = $leftFov;
    }

    public function getRightFov(): float
    {
        return $this->rightFov;
    }

    public function setRightFov(float $rightFov): void
    {
        $this->rightFov = $rightFov;
    }

    public function getBottomFov(): float
    {
        return $this->bottomFov;
    }

    public function setBottomFov(float $bottomFov): void
    {
        $this->bottomFov = $bottomFov;
    }

    public function getTopFov(): float
    {
        return $this->topFov;
    }

    public function setTopFov(float $topFov): void
    {
        $this->topFov = $topFov;
    }

    public function getNear(): float
    {
        return $this->near;
    }

    public function setNear(float $near): void
    {
        $this->near = $near;
    }
}
