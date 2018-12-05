
# PHP LibKML #

[![Build Status](https://travis-ci.org/earelin/php-libkml.svg?branch=2.x.x)](https://travis-ci.org/earelin/php-libkml)
[![codecov](https://codecov.io/gh/earelin/php-libkml/branch/2.x.x/graph/badge.svg)](https://codecov.io/gh/earelin/php-libkml)

A php library to manipulate KML/KMZ files.

php-libKML maps KML/KMZ data into proper objects that follows the KML specification. The purpose of the library is create KML file from code, parse KML files and convert to another formats maintaining the complete KML information.

KML documentation

## Features ##

* KML schema version 2.2
* PHP 7.1+
* Composer integration
* Object oriented design
* Comprehensive KML model
* Import
  * KML

Pending features:

* Google extensions support
* Import
  * KMZ
  * GeoJson
* Export
  * KML/KMZ
  * GeoJson
  * WKT

## Installation ##

It can be installed using composer.

```bash
composer require earelin/php-libkml:^2.0.0
```

## Usage ##

## Contribute ##

Execute unit tests

```bash
composer test
```

Execute acceptance tests

```bash
composer acceptance-test
```

Check code quality with Codesniffer

```bash
composer phpcs
```

Codesniffer automatic code quality fix

```bash
composer phpcbf
```
