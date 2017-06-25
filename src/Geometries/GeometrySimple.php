<?php
namespace KML\Geometries;

abstract class GeometrySimple extends Geometry
{
    protected $extrude;
    protected $tessellate;
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

    public function getAltitudeMode()
    {
        return $this->altitudeMode;
    }

    public function setAltitudeMode($altitudeMode)
    {
        $this->altitudeMode = $altitudeMode;
    }
}
