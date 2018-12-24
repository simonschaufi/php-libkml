<?php

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\TimePrimitive\TimePrimitive;
use LibKml\Domain\KmlObject;

/**
 * AbstractView abstract class.
 */
abstract class AbstractView extends KmlObject {

  protected $timePrimitive = NULL;

  /**
   * @return TimePrimitive
   */
  public function getTimePrimitive(): TimePrimitive {
    return $this->timePrimitive;
  }

  /**
   * @param TimePrimitive $timePrivitive
   */
  public function setTimePrimitive(TimePrimitive $timePrivitive): void {
    $this->timePrimitive = $timePrivitive;
  }

}
