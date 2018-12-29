Feature: Parse <Style>
  In order to manipulate a KML document
  As an user
  I need <Style> tag to be parsed as a Style object

  Scenario: Style with a Balloon
    Given a KML document with a Document in "tests/kml/document.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Container\Document'
    And the feature should contain a Style object with the following properties:
      | property  | value     |
      | id        | style-1   |
      | targetId  | target-1  |
    And the Style should contain a BalloonStyle with the following properties:
      | property    | value     |
      | bgColor     | ffffffbb  |
      | textColor   | ff00aabb  |
      | text        | $[name]   |
      | displayMode | random    |

  Scenario: Style with a IconStyle
    Given a KML document with a Document in "tests/kml/document.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Container\Document'
    And the feature should contain a Style object with the following properties:
      | property  | value     |
      | id        | style-1   |
      | targetId  | target-1  |
    And the Style should contain a IconStyle with the following properties:
      | property  | value     |
      | color     | ff00bbcc  |
      | colorMode | random    |
      | scale     | 0.5       |
      | heading   | 2.56      |

  Scenario: Style with a LabelStyle
    Given a KML document with a Document in "tests/kml/document.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Container\Document'
    And the feature should contain a Style object with the following properties:
      | property  | value     |
      | id        | style-1   |
      | targetId  | target-1  |
    And the Style should contain a LabelStyle with the following properties:
      | property  | value     |
      | color     | ffaabbcc  |
      | colorMode | random    |
      | scale     | 0.75      |
      | heading   | 56.42     |

  Scenario: Style with a LineStyle
    Given a KML document with a Document in "tests/kml/document.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Container\Document'
    And the feature should contain a Style object with the following properties:
      | property  | value     |
      | id        | style-1   |
      | targetId  | target-1  |
    And the Style should contain a LineStyle with the following properties:
      | property  | value     |
      | color     | ffddbbcc  |
      | colorMode | random    |
      | width     | 2.75      |

  Scenario: Style with a ListStyle
    Given a KML document with a Document in "tests/kml/document.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Container\Document'
    And the feature should contain a Style object with the following properties:
      | property  | value     |
      | id        | style-1   |
      | targetId  | target-1  |
    And the Style should contain a ListStyle with the following properties:
      | property      | value       |
      | listItemType  | radioFolder |
      | bgColor       | 55aabbcc    |

  Scenario: Style with a PolyStyle
    Given a KML document with a Document in "tests/kml/document.kml"
    When I parse the KML document
    Then I should get a KmlDocument object containing one feature 'LibKml\Domain\Feature\Container\Document'
    And the feature should contain a Style object with the following properties:
      | property  | value     |
      | id        | style-1   |
      | targetId  | target-1  |
    And the Style should contain a PolyStyle with the following properties:
      | property  | value     |
      | color     | ffddaa00  |
      | colorMode | random    |
      | fill      | 0         |
      | outline   | 0         |
