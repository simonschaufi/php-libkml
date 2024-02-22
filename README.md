# PHP KML parser

[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.me/simonschaufi/10)
[![Latest Stable Version](https://poser.pugx.org/simonschaufi/php-libkml/v/stable)](https://packagist.org/packages/simonschaufi/php-libkml)
[![Total Downloads](https://poser.pugx.org/simonschaufi/php-libkml/downloads)](https://packagist.org/packages/simonschaufi/php-libkml)
[![License](https://poser.pugx.org/simonschaufi/php-libkml/license)](https://packagist.org/packages/simonschaufi/php-libkml)

A php library to parse KML/KMZ files.

php-libKML maps KML/KMZ data into PHP objects that follow the KML specification.
The purpose of the library is to create KML file from code, parse KML files and
convert to another format maintaining the complete KML information.

## Features

* KML schema version 2.2
* PHP 7.4+
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

## Usage

### Installation

The recommended way to install the extension is using [Composer][1].

Run the following command within your Composer based TYPO3 project:

```bash
composer require simonschaufi/php-libkml
```

### Contribution

**Pull Requests** are gladly welcome!

Please remember to add an issue and connect it to your pull requests.
It is very helpful to understand what kind of issue the PR is going to solve.

Bugfixes:

Please describe what kind of bug your fix solves
and give us feedback on how to reproduce the issue.
We're going to accept only bugfixes if we can reproduce the issue.

Execute unit tests:

```bash
composer local:tests:unit
```

Execute acceptance tests:

```bash
composer local:tests:acceptance
```

[1]: https://getcomposer.org/
