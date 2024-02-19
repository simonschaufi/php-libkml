<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\PhotoOverlay;
use LibKml\Reader\Kml\Feature\Overlay\PhotoOverlayParser;
use PHPUnit\Framework\TestCase;

final class PhotoOverlayParserTest extends TestCase
{
    private const KML_PHOTO_OVERLAY = <<<'TAG'
<PhotoOverlay>
  <!-- Feature elements -->
  <name>A simple non-pyramidal photo</name>
  <description>High above the ocean</description>
  <!-- Overlay elements -->
  <Icon>
  <!-- A simple normal jpeg image -->
    <href>small-photo.jpg</href>
  </Icon>
  <!-- PhotoOverlay elements -->
  <!-- default: <rotation> default is 0 -->
  <ViewVolume>
    <near>1000</near>
    <leftFov>-60</leftFov>
    <rightFov>60</rightFov>
    <bottomFov>-45</bottomFov>
    <topFov>45</topFov>
  </ViewVolume>
  <!-- if no ImagePyramid only level 0 is shown,
       fine for a non-pyramidal image -->
  <Point>
    <coordinates>1,1</coordinates>
  </Point>
  <!-- default: <shape> -->
</PhotoOverlay>
TAG;

    private PhotoOverlayParser $photoOverlayParser;

    protected function setUp(): void
    {
        $this->photoOverlayParser = new PhotoOverlayParser();
    }

    public function testParse(): void
    {
        $element = simplexml_load_string(self::KML_PHOTO_OVERLAY);

        $overlay = $this->photoOverlayParser->parse($element);

        self::assertInstanceOf(PhotoOverlay::class, $overlay);
    }
}
