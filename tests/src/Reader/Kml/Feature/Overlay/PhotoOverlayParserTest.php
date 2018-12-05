<?php

namespace LibKml\Tests\Reader\Kml\Feature\Overlay;

use LibKml\Reader\Kml\Feature\Overlay\PhotoOverlayParser;
use PHPUnit\Framework\TestCase;

class PhotoOverlayParserTest {

  protected $photoOverlayParser;

  public function setUp() {
    $this->photoOverlayParser = new PhotoOverlayParser();
  }

}
