<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\FieldType\Atom;

use LibKml\Domain\FieldType\Atom\Author;
use PHPUnit\Framework\TestCase;

final class AuthorTest extends TestCase
{
    private Author $author;

    protected function setUp(): void
    {
        $this->author = new Author();
    }

    public function testNameField(): void
    {
        $name = 'John Smith';

        $this->author->setName($name);

        self::assertEquals($name, $this->author->getName());
    }

    public function testEmailField(): void
    {
        $email = 'john.smith@gmail.com';

        $this->author->setEmail($email);

        self::assertEquals($email, $this->author->getEmail());
    }

    public function testUriField(): void
    {
        $uri = 'http://www.john-smith.person';

        $this->author->setUri($uri);

        self::assertEquals($uri, $this->author->getUri());
    }
}
