<?php

namespace LibKml\Domain\ExtendedData;

class ExtendedData {

  private $data = [];
  private $schemaData = [];

  public function getData(): array {
    return $this->data;
  }

  public function setData(array $data): void {
    $this->data = $data;
  }

  public function getSchemaData(): array {
    return $this->schemaData;
  }

  public function setSchemaData(array $schemaData): void {
    $this->schemaData = $schemaData;
  }

}
