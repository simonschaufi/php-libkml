<?php

namespace LibKml\Domain\Feature\ExtendedData;

/**
 * Allows to add custom data to a Feature.
 */
class ExtendedData {

  private $data = [];
  private $schemaData = [];
  private $other = [];

  public function addData(Data $data): void {
    $this->data[] = $data;
  }

  public function clearData(): void {
    $this->data = [];
  }

  public function getData(): array {
    return $this->data;
  }

  public function setData(array $data): void {
    $this->data = $data;
  }

  public function addSchemaData(SchemaData $schemaData): void {
    $this->schemaData[] = $schemaData;
  }

  public function clearSchemaData(): void {
    $this->schemaData = [];
  }

  public function getSchemaData(): array {
    return $this->schemaData;
  }

  public function setSchemaData(array $schemaData): void {
    $this->schemaData = $schemaData;
  }

  public function getOther(): array {
    return $this->other;
  }

  public function setOther(array $other): void {
    $this->other = $other;
  }

}
