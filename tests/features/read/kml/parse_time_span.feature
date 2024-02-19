Feature: Parse <TimeSpan>
  In order to manipulate a KML document
  As an user
  I need <TimeSpan> tag to be parsed as a TimeSpan object

  Scenario:
    Given a KML document with a NetworkLinkControl in "tests/kml/time-span.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one NetworkLinkControl
    And the NetworkLinkControl should contain a Camera with a 'TimeSpan' TimePrimitive property
    And the TimeSpan object should contain the following properties:
      | property  | value                   |
      | begin     | 2021-09-12T15:07:35.678 |
      | end       | 2021-09-12T16:14:18.765 |
