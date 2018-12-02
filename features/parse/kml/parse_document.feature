Feature: Parse <Document>
  In order to manipulate a KML document
  As an user
  I need <Document> tag to be parsed as a Document object

  Scenario:
    Given a KML document with a Document in "tests/kml/document.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one Document
    And the Document will have the following data:
      | property    | value                 |
      | id          | document1            |
      | targetId    | target1               |
      | name        | My office             |
      | visibility  | 1                     |
      | address     | Blackfriards 240      |
      | phoneNumber | tel:+44 7890123456789 |
      | snippet     | Office location       |
      | styleUrl    | #myIconStyle          |
