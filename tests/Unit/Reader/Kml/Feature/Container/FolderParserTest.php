<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Feature\Container;

use LibKml\Domain\Feature\Container\Folder;
use LibKml\Domain\Feature\Placemark;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\Feature\Container\FolderParser;
use PHPUnit\Framework\TestCase;

final class FolderParserTest extends TestCase
{
    private const KML_FOLDER = <<< 'TAG'
<Folder id="folder-1" targetId="target-1">
  <name>Folder.kml</name>
  <open>1</open>
  <description>
    A folder is a container that can hold multiple other objects
  </description>
  <Placemark>
    <name>Folder object 1 (Placemark)</name>
    <Point>
      <coordinates>-122.377588,37.830266,0</coordinates>
    </Point>
  </Placemark>
  <Placemark>
    <name>Folder object 2 (Polygon)</name>
    <Polygon>
      <outerBoundaryIs>
        <LinearRing>
          <coordinates>
            -122.377830,37.830445,0
            -122.377576,37.830631,0
            -122.377840,37.830642,0
            -122.377830,37.830445,0
          </coordinates>
        </LinearRing>
      </outerBoundaryIs>
    </Polygon>
  </Placemark>
  <Placemark>
    <name>Folder object 3 (Path)</name>
    <LineString>
      <tessellate>1</tessellate>
      <coordinates>
        -122.378009,37.830128,0 -122.377885,37.830379,0
      </coordinates>
    </LineString>
  </Placemark>
</Folder>
TAG;

    private FolderParser $folderParser;
    private KmlObject $folder;

    protected function setUp(): void
    {
        $this->folderParser = new FolderParser();

        $element = simplexml_load_string(self::KML_FOLDER);

        $this->folder = $this->folderParser->parse($element);
    }

    public function testParseFolder(): void
    {
        self::assertInstanceOf(Folder::class, $this->folder);
    }

    public function testParseId(): void
    {
        self::assertEquals('folder-1', $this->folder->getId());
    }

    public function testParseTargetId(): void
    {
        self::assertEquals('target-1', $this->folder->getTargetId());
    }

    public function testParseName(): void
    {
        self::assertEquals('Folder.kml', $this->folder->getName());
    }

    public function testParseOpen(): void
    {
        self::assertTrue($this->folder->getOpen());
    }

    public function testParseFeatures(): void
    {
        self::assertCount(3, $this->folder->getFeatures());
        self::assertContainsOnlyInstancesOf(Placemark::class, $this->folder->getFeatures());
    }
}
