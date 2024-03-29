Feature: Parse <ScreenOverlay>
  In order to manipulate a KML document
  As an user
  I need <ScreenOverlay> tag to be parsed as a ScreenOverlay object

  Scenario:
    Given a KML document with a ScreenOverlay in "tests/kml/screen-overlay.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Overlay\ScreenOverlay'
    And the feature ScreenOverlay should contain the following properties:
      | property    | value                 |
      | id          | screen-overlay-1      |
      | targetId    | target-1              |
      | name        | Centered icon         |
      | visibility  | false                 |
      | address     | Blackfriards 240      |
      | phoneNumber | tel:+44 7890123456789 |
      | snippet     | Office location       |
      | styleUrl    | #myIconStyle          |
