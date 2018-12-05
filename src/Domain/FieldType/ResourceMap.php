<?php

namespace LibKml\Domain\FieldType;

/**
 * ResouceMap class.
 */
class ResourceMap {

  private $aliases = [];

  public function getAliases() {
    return $this->aliases;
  }

  public function setAliases(array $aliases) {
    $this->aliases = $aliases;
  }

  public function clearAliases() {
    $this->aliases = [];
  }

  public function addAlias($alias) {
    $this->aliases[] = $alias;
  }

}
