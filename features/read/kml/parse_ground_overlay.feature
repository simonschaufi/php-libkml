Feature: Parse <GroundOverlay>
  In order to manipulate a KML document
  As an user
  I need <GroundOverlay> tag to be parsed as a GroundOverlay object

  Scenario:
    Given a KML document with a GroundOverlay in "tests/kml/ground-overlay.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one 'LibKml\Domain\Feature\Overlay\GroundOverlay'
    And the GroundOverlay should contain the following properties:
      | property    | value                          |
      | name        | Large-scale overlay on terrain |
      | visibility  | false                           |
