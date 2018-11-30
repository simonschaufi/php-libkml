<?php

namespace LibKml\Domain;

use LibKml\Domain\AbstractView\Camera;
use LibKml\Domain\AbstractView\LookAt;
use LibKml\Domain\Feature\Container\Document;
use LibKml\Domain\Feature\Container\Folder;
use LibKml\Domain\Feature\Container\Schema;
use LibKml\Domain\Feature\NetworkLink;
use LibKml\Domain\Feature\Overlay\GroundOverlay;
use LibKml\Domain\Feature\Overlay\PhotoOverlay;
use LibKml\Domain\Feature\Overlay\ScreenOverlay;
use LibKml\Domain\Feature\Placemark;
use LibKml\Domain\Geometry\LinearRing;
use LibKml\Domain\Geometry\LineString;
use LibKml\Domain\Geometry\Model;
use LibKml\Domain\Geometry\MultiGeometry;
use LibKml\Domain\Geometry\Point;
use LibKml\Domain\Geometry\Polygon;
use LibKml\Domain\Geometry\ResourceMap;
use LibKml\Domain\Link\Link;
use LibKml\Domain\StyleSelector\Style;
use LibKml\Domain\StyleSelector\StyleMap;
use LibKml\Domain\SubStyle\BalloonStyle;
use LibKml\Domain\SubStyle\ColorStyle\IconStyle;
use LibKml\Domain\SubStyle\ColorStyle\LabelStyle;
use LibKml\Domain\SubStyle\ColorStyle\LineStyle;
use LibKml\Domain\SubStyle\ColorStyle\PolyStyle;
use LibKml\Domain\SubStyle\ListStyle;
use LibKml\Domain\TimePrimitive\TimeSpan;
use LibKml\Domain\TimePrimitive\TimeStamp;

/**
 * KmlObjects visitor interface.
 *
 * @package LibKml\Domain
 */
interface KmlObjectVisitorInterface {

  public function visitIcon(Icon $icon);

  public function visitLink(Link $link);

  public function visitRegion(Region $region);

  public function visitCamera(Camera $camera);

  public function visitLookAt(LookAt $lookAt);

  public function visitNetworkLink(NetworkLink $networkLink);

  public function visitPlacemark(Placemark $placemark);

  public function visitSchema(Schema $schema);

  public function visitDocument(Document $document);

  public function visitFolder(Folder $folder);

  public function visitGroundOverlay(GroundOverlay $groundOverlay);

  public function visitPhotoOverlay(PhotoOverlay $photoOverlay);

  public function visitScreenOverlay(ScreenOverlay $screenOverlay);

  public function visitLinearRing(LinearRing $linearRing);

  public function visitLineString(LineString $lineString);

  public function visitModel(Model $model);

  public function visitMultiGeometry(MultiGeometry $multiGeometry);

  public function visitPoint(Point $point);

  public function visitPolygon(Polygon $polygon);

  public function visitResourceMap(ResourceMap $resourceMap);

  public function visitStyle(Style $style);

  public function visitStyleMap(StyleMap $styleMap);

  public function visitBalloonStyle(BalloonStyle $balloonStyle);

  public function visitListStyle(ListStyle $listStyle);

  public function visitIconStyle(IconStyle $iconStyle);

  public function visitTimeSpan(TimeSpan $timeSpan);

  public function visitTimeStamp(TimeStamp $timeStamp);

  public function visitLabelStyle(LabelStyle $labelStyle);

  public function visitLineStyle(LineStyle $lineStyle);

  public function visitPolyStyle(PolyStyle $polyStyle);

}
