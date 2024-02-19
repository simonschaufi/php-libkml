<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Alias;
use LibKml\Domain\FieldType\ResourceMap;

class ResourceMapParser
{
    public static function parse(\SimpleXMLElement $element): ResourceMap
    {
        $resourceMap = new ResourceMap();

        foreach ($element->children() as $childElement) {
            if ($childElement->getName() === 'Alias') {
                $alias = new Alias();

                if (isset($childElement->sourceHref)) {
                    $alias->setSourceHref((string)$childElement->sourceHref);
                }

                if (isset($childElement->targetHref)) {
                    $alias->setTargetHref((string)$childElement->targetHref);
                }

                $resourceMap->addAlias($alias);
            }
        }

        return $resourceMap;
    }
}
