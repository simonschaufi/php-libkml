<?php

namespace LibKml\Domain\Feature\ExtendedData;

class SchemaData {

  private $schemaUrl;
  private $simpleData = [];

  public function getSchemaUrl() {
    return $this->schemaUrl;
  }

  public function setSchemaUrl($schemaUrl): void {
    $this->schemaUrl = $schemaUrl;
  }

  public function getSimpleData(): array {
    return $this->simpleData;
  }

  public function setSimpleData(array $simpleData): void {
    $this->simpleData = $simpleData;
  }

}
