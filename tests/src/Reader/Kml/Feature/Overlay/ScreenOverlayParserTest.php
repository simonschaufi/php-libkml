<?php

namespace LibKml\Tests\Reader\Kml\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\ScreenOverlay;
use LibKml\Reader\Kml\Feature\Overlay\ScreenOverlayParser;
use PHPUnit\Framework\TestCase;

class ScreenOverlayParserTest extends TestCase {

  const KML_SCREEN_OVERLAY = <<< 'TAG'
<ScreenOverlay id="khScreenOverlay756">
  <name>Simple crosshairs</name>
  <description>This screen overlay uses fractional positioning
   to put the image in the exact center of the screen</description>
  <Icon>
    <href>http://myserver/myimage.jpg</href>
  </Icon>
  <overlayXY x="0.5" y="0.5" xunits="fraction" yunits="fraction"/>
  <screenXY x="0.5" y="0.5" xunits="fraction" yunits="fraction"/>
  <rotation>39.37878630116985</rotation>
  <size x="0" y="0" xunits="pixels" yunits="pixels"/>
</ScreenOverlay>
TAG;
  
  protected $screenOverlayParser;

  public function setUp() {
    $this->screenOverlayParser = new ScreenOverlayParser();
  }

  public function testParse() {
    $element = simplexml_load_string(self::KML_SCREEN_OVERLAY);

    $overlay = $this->screenOverlayParser->parse($element);

    $this->assertInstanceOf(ScreenOverlay::class, $overlay);
  }

}
