Feature: Parse <Placemark>
  In order to manipulate a KML document
  As an user
  I need <Placemark> tag to be parsed as a Placemark object

  Scenario:
    Given a KML document with a Placemark in "tests/kml/placemark.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Placemark'
    And the feature Placemark should contain the following properties:
      | property    | value                 |
      | id          | placemark1            |
      | targetId    | target1               |
      | name        | My office             |
      | visibility  | false                 |
      | address     | Blackfriards 240      |
      | phoneNumber | tel:+44 7890123456789 |
      | snippet     | Office location       |
      | styleUrl    | #myIconStyle          |
    And the feature should contain a LookAt object with the the following properties:
      | property      | value       |
      | longitude     | 1.67        |
      | latitude      | 15.678      |
      | altitude      | 50          |
      | heading       | 57.85       |
      | tilt          | -10.5       |
      | range         | 345.8       |
      | altitudeMode  | absolute    |
