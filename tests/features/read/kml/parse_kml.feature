Feature: Parse KML
  In order to manipulate a KML document
  As an user
  I need the KML document imported as a KMLDocument object

  Scenario: Parsing a KML Document with a feature
    Given a KML document in "tests/kml/document.kml"
    When I parse the KML document
    Then I should get a KmlDocument
    And the KmlDocument should contain a Feature with:
      | property    | value                 |
      | id          | document1             |
      | targetId    | target1               |
      | name        | My office             |
      | visibility  | 1                     |
      | address     | Blackfriards 240      |
      | phoneNumber | tel:+44 7890123456789 |
      | snippet     | Office location       |
      | styleUrl    | #myIconStyle          |
