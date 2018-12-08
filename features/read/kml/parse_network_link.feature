Feature: Parse <NetworkLink>
  In order to manipulate a KML document
  As an user
  I need <NetworkLink> tag to be parsed as a NetworkLink object

  Scenario:
    Given a KML document with a NetworkLink in "tests/kml/network-link.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one 'LibKml\Domain\Feature\Overlay\NetworkLink'
    And the NetworkLink should contain the following properties:
      | property    | value                 |
      | id          | networkLink1          |
      | targetId    | target1               |
      | name        | My office             |
      | visibility  | 1                     |
      | address     | Blackfriards 240      |
      | phoneNumber | tel:+44 7890123456789 |
      | snippet     | Office location       |
      | styleUrl    | #myIconStyle          |
