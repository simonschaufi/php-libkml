Feature: Parse <PhotoOverlay>
  In order to manipulate a KML document
  As an user
  I need <PhotoOverlay> tag to be parsed as a PhotoOverlay object

  Scenario:
    Given a KML document with a PhotoOverlay in "tests/kml/photo-overlay.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one 'LibKml\Domain\Feature\Overlay\PhotoOverlay'
    And the Placemark should contain the following properties:
      | property    | value                 |
      | id          | photoOverlay1         |
      | targetId    | target1               |
      | name        | My office             |
      | visibility  | 1                     |
      | address     | Blackfriards 240      |
      | phoneNumber | tel:+44 7890123456789 |
      | snippet     | Office location       |
      | styleUrl    | #myIconStyle          |
