<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType\Atom;

/**
 * Author class implements a xmlns:atom:author object.
 */
class Link
{
    private ?string $href = null;
    private ?string $rel = null;
    private ?string $type = null;
    private ?string $hreflang = null;
    private ?string $title = null;
    private ?int $length = null;

    public function getHref(): ?string
    {
        return $this->href;
    }

    public function setHref(string $href): void
    {
        $this->href = $href;
    }

    public function getRel(): ?string
    {
        return $this->rel;
    }

    public function setRel(string $rel): void
    {
        $this->rel = $rel;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getHreflang(): ?string
    {
        return $this->hreflang;
    }

    public function setHreflang(string $hreflang): void
    {
        $this->hreflang = $hreflang;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(int $length): void
    {
        $this->length = $length;
    }
}
