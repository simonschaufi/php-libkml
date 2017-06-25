<?php
namespace KML\Geometries;

use KML\Features\AltitudeMode;

abstract class GeometrySimple extends Geometry
{
    protected $extrude;
    protected $tessellate;
    /** @var  AltitudeMode */
    protected $altitudeMode;

    public function getExtrude()
    {
        return $this->extrude;
    }

    public function setExtrude($extrude)
    {
        $this->extrude = $extrude;
    }

    public function getTessellate()
    {
        return $this->tessellate;
    }

    public function setTessellate($tessellate)
    {
        $this->tessellate = $tessellate;
    }

    public function getAltitudeMode(): AltitudeMode
    {
        return $this->altitudeMode;
    }

    public function setAltitudeMode(AltitudeMode $altitudeMode)
    {
        $this->altitudeMode = $altitudeMode;
    }
}
