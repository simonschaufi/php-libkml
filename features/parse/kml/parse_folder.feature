Feature: Parse <Folder>
  In order to manipulate a KML document
  As an user
  I need <Folder> tag to be parsed as a Folder object

  Scenario:
    Given a KML document with a Folder in "tests/kml/folder.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one Folder
    And the Folder will have the following data:
      | property    | value                 |
      | id          | folder1            |
      | targetId    | target1               |
      | name        | My office             |
      | visibility  | 1                     |
      | address     | Blackfriards 240      |
      | phoneNumber | tel:+44 7890123456789 |
      | snippet     | Office location       |
      | styleUrl    | #myIconStyle          |
