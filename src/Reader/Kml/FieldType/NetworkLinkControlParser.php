<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\NetworkLinkControl;
use LibKml\Reader\Kml\AbstractView\AbstractViewExtractor;

class NetworkLinkControlParser
{
    public static function parse(\SimpleXMLElement $element): NetworkLinkControl
    {
        $networkLinkControl = new NetworkLinkControl();

        if (isset($element->minRefreshPeriod)) {
            $networkLinkControl->setMinRefreshPeriod((float)$element->minRefreshPeriod);
        }

        if (isset($element->maxSessionLength)) {
            $networkLinkControl->setMaxSessionLength((float)$element->maxSessionLength);
        }

        if (isset($element->cookie)) {
            $networkLinkControl->setCookie((string)$element->cookie);
        }

        if (isset($element->message)) {
            $networkLinkControl->setMessage((string)$element->message);
        }

        if (isset($element->linkName)) {
            $networkLinkControl->setLinkName((string)$element->linkName);
        }

        if (isset($element->linkDescription)) {
            $networkLinkControl->setLinkDescription((string)$element->linkDescription);
        }

        if (isset($element->linkSnippet)) {
            $networkLinkControl->setLinkSnippet((string)$element->linkSnippet);
        }

        if (isset($element->expires)) {
            $networkLinkControl->setExpires((string)$element->expires);
        }

        $view = AbstractViewExtractor::extract($element);
        $networkLinkControl->setAbstractView($view);

        return $networkLinkControl;
    }
}
