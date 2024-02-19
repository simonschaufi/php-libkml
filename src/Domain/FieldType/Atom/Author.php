<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType\Atom;

/**
 * Author class implements a xmlns:atom:author object.
 */
class Author
{
    private ?string $name = null;
    private ?string $uri = null;
    private ?string $email = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function setUri(string $uri): void
    {
        $this->uri = $uri;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
