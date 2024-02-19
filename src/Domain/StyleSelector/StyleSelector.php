<?php

declare(strict_types=1);

namespace LibKml\Domain\StyleSelector;

use LibKml\Domain\KmlObject;

/**
 * This is an abstract element and cannot be used directly in a KML file.
 * It is the base type for the <@Style> and <@StyleMap> elements.
 * The StyleMap element selects a style based on the current mode of the Placemark.
 *
 * @see https://developers.google.com/kml/documentation/kmlreference#styleselector
 */
abstract class StyleSelector extends KmlObject {}
