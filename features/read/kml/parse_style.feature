Feature: Parse <Style>
  In order to manipulate a KML document
  As an user
  I need <Style> tag to be parsed as a Style object

  Scenario:
    Given a KML document with a Document in "tests/kml/style.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one Style
    And the Style object should contain a IconStyle object with the following properties:
      | property  | value                   |
      | color     | ffffffff |
      | colorMode | 2021-09-12T16:14:18.765 |
