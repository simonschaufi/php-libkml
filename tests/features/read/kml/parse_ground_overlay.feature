Feature: Parse <GroundOverlay>
  In order to manipulate a KML document
  As an user
  I need <GroundOverlay> tag to be parsed as a GroundOverlay object

  Scenario:
    Given a KML document with a GroundOverlay in "tests/kml/ground-overlay.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one GroundOverlay
    And the GroundOverlay will have the following properties:
      | property    | value                 |
      | id          | groundOverlay1        |
      | targetId    | target1               |
      | name        | My office             |
      | visibility  | 1                     |
      | address     | Blackfriards 240      |
      | phoneNumber | tel:+44 7890123456789 |
      | snippet     | Office location       |
      | styleUrl    | #myIconStyle          |
