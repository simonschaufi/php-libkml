<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\Feature;

use LibKml\Domain\Feature\Feature;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\AbstractView\AbstractViewExtractor;
use LibKml\Reader\Kml\KmlObjectParser;
use LibKml\Reader\Kml\StyleSelector\StyleSelectorExtractor;

abstract class FeatureParser extends KmlObjectParser
{
    /**
     * @param KmlObject|Feature $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->name)) {
            $kmlObject->setName((string)$element->name);
        }

        if (isset($element->visibility)) {
            $kmlObject->setVisibility(filter_var($element->visibility, FILTER_VALIDATE_BOOLEAN));
        }

        if (isset($element->open)) {
            $kmlObject->setOpen(filter_var($element->open, FILTER_VALIDATE_BOOLEAN));
        }

        if (isset($element->address)) {
            $kmlObject->setAddress((string)$element->address);
        }

        if (isset($element->phoneNumber)) {
            $kmlObject->setPhoneNumber((string)$element->phoneNumber);
        }

        if (isset($element->Snippet)) {
            $kmlObject->setSnippet(trim((string)$element->Snippet));
        }

        if (isset($element->description)) {
            $kmlObject->setDescription((string)$element->description);
        }

        if (isset($element->styleUrl)) {
            $kmlObject->setStyleUrl((string)$element->styleUrl);
        }

        $kmlObject->setAbstractView(AbstractViewExtractor::extract($element));
        $kmlObject->setStyleSelectors(StyleSelectorExtractor::extractStyleSelectors($element));
    }
}
