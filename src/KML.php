<?php
namespace KML;

use KML\Features\Containers\Container;
use KML\Features\Feature;

/**
 * KML default schema version
 */
define('KML_DEFAULT_SCHEMA_VERSION', '2.2');

/**
 * KML default encoding
 */
define('KML_DEFAULT_ENCODING', 'UTF-8');


/**
 *   kml root element class
 */
class KML
{
    /** @var Feature */
    private $feature;
    /** @var string  */
    private $version = KML_DEFAULT_SCHEMA_VERSION;
    /** @var string  */
    private $encoding = KML_DEFAULT_ENCODING;

    public function __construct(Feature $feature = null)
    {
        $this->feature = $feature;
    }

    public static function createFromText(string $text): KML
    {
        $enc = mb_detect_encoding($text);
        $xml = mb_convert_encoding($text, 'UTF-8', $enc);

        return KMLBuilder::buildKML(new \SimpleXMLElement($xml));
    }

    public function __toString(): string
    {
        $output = [];

        $output[] = sprintf("<?xml version=\"1.0\" encoding=\"%s\"?>", $this->encoding);
        $output[] = sprintf("<kml xmlns=\"http://www.opengis.net/kml/%s\">", $this->version);

        if (isset($this->feature)) {
            $output[] = $this->feature->__toString();
        }

        $output[] = '</kml>';

        return implode("\n", $output);
    }

    /**
     *  Generate WKT
     */
    public function toWKT(): string
    {
        if (isset($this->feature)) {
            if ($this->feature instanceof Container) {
                return sprintf("GEOMETRYCOLLECTION(%s)", $this->feature->toWKT());
            } else {
                return $this->feature->toWKT();
            }
        }

        return '';
    }

    /**
     *  Generate WKT without z-coordinates
     */
    public function toWKT2d(): string
    {
        if (isset($this->feature)) {
            if ($this->feature instanceof Container) {
                return sprintf("GEOMETRYCOLLECTION(%s)", $this->feature->toWKT2d());
            } else {
                return $this->feature->toWKT2d();
            }
        }

        return '';
    }

    public function toJSON(): string
    {
        $json_data = [];

        if (isset($this->feature)) {
            $all_features = $this->getAllFeatures();

            $json_data['type'] = 'FeatureCollection';
            $json_data['features'] = [];

            foreach ($all_features as $feature) {
                $json_feature = $feature->toJSON();
                if ($json_feature) {
                    $json_data['features'][] = $json_feature;
                }
            }
        }

        return json_encode($json_data);
    }

    public function toExtGeoJSON(): string
    {
        $json_data = [];

        if (isset($this->feature)) {
            $all_features = $this->getAllFeatures();

            $json_data['type'] = 'FeatureCollection';
            $json_data['features'] = [];

            foreach ($all_features as $feature) {
                $json_feature = $feature->toExtGeoJSON();
                if ($json_feature) {
                    $json_data['features'][] = $json_feature;
                }
            }
        }

        return json_encode($json_data);
    }

    /**
     * Returns all Styles in the KML
     */
    public function getAllStyles(): array
    {
        $all_styles = [];

        if (isset($this->feature)) {
            $all_styles = array_merge($all_styles, $this->feature->getAllStyles());
        }

        return $all_styles;
    }

    /**
     * Returns all features in the KML
     */
    public function getAllFeatures(): array
    {
        $all_features = [];

        if (isset($this->feature)) {
            $all_features = array_merge($all_features, $this->feature->getAllFeatures());
        }

        return $all_features;
    }

    public function setFeature(Feature $feature)
    {
        $this->feature = $feature;
    }

    public function getFeature(): Feature
    {
        return $this->feature;
    }
}
