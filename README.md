# PHP KML parser

A php library to parse KML/KMZ files.

php-libKML maps KML/KMZ xml data into PHP objects that follow the KML specification.
The purpose of the library is to create KML file from code, parse KML files and convert to another format maintaining the complete KML information.

## Features

* KML schema version 2.2
* PHP 7.1+
* Composer integration
* Object oriented design
* Comprehensive KML model
* Import
  * KML

Future features:

* Google extensions support
* Import
  * KMZ
  * GeoJson
* Export
  * KML/KMZ
  * GeoJson
  * WKT

## Installation

It can be installed using composer.

```bash
composer require simonschaufi/php-libkml
```

## Usage

## Contribute

Execute unit tests

```bash
composer local:tests:unit
```

Execute acceptance tests

```bash
composer local:tests:acceptance
```
