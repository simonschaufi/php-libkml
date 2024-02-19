Feature: Parse <Folder>
  In order to manipulate a KML document
  As an user
  I need <Folder> tag to be parsed as a Folder object

  Scenario:
    Given a KML document with a Folder in "tests/kml/folder.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Container\Folder'
    And the feature Folder should contain the following properties:
      | property    | value                 |
      | id          | folder-1              |
      | targetId    | target-1              |
      | name        | Document with XML id  |
      | open        | true                  |
