Feature: Parse <TimeStamp>
  In order to manipulate a KML document
  As an user
  I need <TimeStamp> tag to be parsed as a TimeStamp object

  Scenario:
    Given a KML document with a NetworkLinkControl in "tests/kml/time-stamp.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one NetworkLinkControl
    And the NetworkLinkControl should contain a Camera with a 'TimeStamp' TimePrimitive property
    And the TimeStamp object should contain the following properties:
      | property  | value                   |
      | when      | 2021-09-12T15:07:35.678 |
