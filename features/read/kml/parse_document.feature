Feature: Parse <Document>
  In order to manipulate a KML document
  As an user
  I need <Document> tag to be parsed as a Document object

  Scenario:
    Given a KML document with a Document in "tests/kml/document.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Container\Document'
    And the feature Document should contain the following properties:
      | property    | value                 |
      | id          | document-1            |
      | targetId    | target-1              |
      | name        | Document with XML id  |
      | open        | true                  |
