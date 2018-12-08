Feature: Parse <NetworkLink>
  In order to manipulate a KML document
  As an user
  I need <NetworkLink> tag to be parsed as a NetworkLink object

  Scenario:
    Given a KML document with a NetworkLink in "tests/kml/network-link.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one 'LibKml\Domain\Feature\NetworkLink'
    And the NetworkLink should contain the following properties:
      | property    | value                 |
      | name        | Open NetworkLink      |
      | open        | true                  |
