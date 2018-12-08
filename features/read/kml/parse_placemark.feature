Feature: Parse <Placemark>
  In order to manipulate a KML document
  As an user
  I need <Placemark> tag to be parsed as a Placemark object

  Scenario:
    Given a KML document with a Placemark in "tests/kml/placemark.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one 'LibKml\Domain\Feature\Placemark'
    And the Placemark should contain the following properties:
      | property    | value                 |
      | id          | placemark1            |
      | targetId    | target1               |
      | name        | My office             |
      | visibility  | true                  |
      | address     | Blackfriards 240      |
      | phoneNumber | tel:+44 7890123456789 |
      | snippet     | Office location       |
      | styleUrl    | #myIconStyle          |
