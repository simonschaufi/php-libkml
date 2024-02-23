<?php

declare(strict_types=1);

namespace LibKml\Domain\TimePrimitive;

use LibKml\Domain\KmlObject;

/**
 * This is an abstract element and cannot be used directly in a KML file. This element is extended by the <TimeSpan> and <TimeStamp> elements.
 *
 * @see https://developers.google.com/kml/documentation/kmlreference#timeprimitive
 */
abstract class TimePrimitive extends KmlObject {}
