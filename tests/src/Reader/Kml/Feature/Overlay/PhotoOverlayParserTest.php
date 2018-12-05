<?php

namespace LibKml\Tests\Reader\Kml\Feature\Overlay;

use LibKml\Reader\Kml\Feature\Overlay\PhotoOverlayParser;
use PHPUnit\Framework\TestCase;

class PhotoOverlayParserTest extends TestCase {

  protected $photoOverlayParser;

  public function setUp() {
    $this->photoOverlayParser = new PhotoOverlayParser();
  }

}
