Feature: Parse <NetworkLinkControl>
  In order to manipulate a KML document
  As an user
  I need <NetworkLinkControl> tag to be parsed as a NetworkLinkControl object

  Scenario:
    Given a KML document with a NetworkLinkControl in "tests/kml/network-link.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one NetworkLinkControl
    And the NetworkLinkControl should have the following properties:
      | property         | value            |
      | minRefreshPeriod | 60               |
      | maxSessionLength | 3600             |
      | cookie           | language=en      |
      | message          | Hello world!     |
      | linkName         | Link name        |
      | linkDescription  | Link description |
      | linkSnippet      | Link snippet     |
      | expires          | 2323198129301    |
