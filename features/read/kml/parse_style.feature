Feature: Parse <Style>
  In order to manipulate a KML document
  As an user
  I need <Style> tag to be parsed as a Style object

  Scenario: Style with a Balloon
    Given a KML document with a Document in "tests/kml/style.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Container\Document'
    And the feature should contain a Style object with the following properties:
      | property  | value     |
      | id        | style-1   |
      | targetId  | target-1  |
    And the Style should contain a BalloonStyle with the following properties:
      | property    | value     |
      | text        | $[name]   |
      | displayMode | random    |
    And the BalloonStyle should contain the following property colors:
      | property    | value     |
      | bgColor     | ffffffbb  |
      | textColor   | ff00aabb  |

  Scenario: Style with a IconStyle
    Given a KML document with a Document in "tests/kml/style.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Container\Document'
    And the feature should contain a Style object with the following properties:
      | property  | value     |
      | id        | style-1   |
      | targetId  | target-1  |
    And the Style should contain a IconStyle with the following properties:
      | property  | value     |
      | colorMode | random    |
      | scale     | 1.39      |
      | heading   | 2.56      |
    And the IconStyle should contain the following property colors:
      | property  | value     |
      | color     | a1ff00ff  |

  Scenario: Style with a LabelStyle
    Given a KML document with a Document in "tests/kml/style.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Container\Document'
    And the feature should contain a Style object with the following properties:
      | property  | value     |
      | id        | style-1   |
      | targetId  | target-1  |
    And the Style should contain a LabelStyle with the following properties:
      | property  | value     |
      | colorMode | random    |
      | scale     | 1.5       |
    And the LabelStyle should contain the following property colors:
      | property  | value     |
      | color     | 7fffaaff  |

  Scenario: Style with a LineStyle
    Given a KML document with a Document in "tests/kml/style.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Container\Document'
    And the feature should contain a Style object with the following properties:
      | property  | value     |
      | id        | style-1   |
      | targetId  | target-1  |
    And the Style should contain a LineStyle with the following properties:
      | property  | value     |
      | colorMode | random    |
      | width     | 2.75      |
    And the LineStyle should contain the following property colors:
      | property  | value     |
      | color     | ffddbbcc  |

  Scenario: Style with a ListStyle
    Given a KML document with a Document in "tests/kml/style.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Container\Document'
    And the feature should contain a Style object with the following properties:
      | property  | value     |
      | id        | style-1   |
      | targetId  | target-1  |
    And the Style should contain a ListStyle with the following properties:
      | property      | value       |
      | listItemType  | radioFolder |
    And the ListStyle should contain the following property colors:
      | property      | value       |
      | bgColor       | 55aabbcc    |

  Scenario: Style with a PolyStyle
    Given a KML document with a Document in "tests/kml/style.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Container\Document'
    And the feature should contain a Style object with the following properties:
      | property  | value     |
      | id        | style-1   |
      | targetId  | target-1  |
    And the Style should contain a PolyStyle with the following properties:
      | property  | value     |
      | colorMode | random    |
      | fill      | 0         |
      | outline   | 0         |
    And the PolyStyle should contain the following property colors:
      | property  | value     |
      | color     | ffddaa00  |
