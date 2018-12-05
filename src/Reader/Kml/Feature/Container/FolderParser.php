<?php

namespace LibKml\Reader\Kml\Feature\Container;

use LibKml\Domain\Feature\Container\Folder;
use LibKml\Domain\KmlObject;

class FolderParser extends ContainerParser {

  protected function buildKmlObject(): KmlObject {
    return new Folder();
  }

}
