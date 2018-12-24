Feature: Parse <PhotoOverlay>
  In order to manipulate a KML document
  As an user
  I need <PhotoOverlay> tag to be parsed as a PhotoOverlay object

  Scenario:
    Given a KML document with a PhotoOverlay in "tests/kml/photo-overlay.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Overlay\PhotoOverlay'
    And the feature Placemark should contain the following properties:
      | property    | value                                         |
      | id          | photo-overlay-1                               |
      | targetId    | target-1                                      |
      | name        | Seattle Space Needle                          |
      | visibility  | false                                         |
      | address     | Blackfriards 240                              |
      | phoneNumber | tel:+44 7890123456789                         |
      | snippet     | <a href="#space-needle">Fly into picture</a>  |
      | styleUrl    | #myIconStyle                                  |
