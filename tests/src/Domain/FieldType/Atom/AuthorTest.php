<?php

namespace LibKml\Tests\Domain\FieldType\Atom;

use LibKml\Domain\FieldType\Atom\Author;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase {

  /**
   * @var Author
   */
  protected $author;

  public function setUp() {
    $this->author = new Author();
  }

  public function testNameField() {
    $name = "John Smith";

    $this->author->setName($name);

    $this->assertEquals($name, $this->author->getName());
  }

  public function testEmailField() {
    $email = "john.smith@gmail.com";

    $this->author->setEmail($email);

    $this->assertEquals($email, $this->author->getEmail());
  }

  public function testUriField() {
    $uri = "http://www.john-smith.person";

    $this->author->setUri($uri);

    $this->assertEquals($uri, $this->author->getUri());
  }
}
