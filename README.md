# Readme - Technical Test: Trip Sorter

## Assumptions Made

* Journey start points or destinations won't overlap such that you either start in or leave an area more than once.
* Flights and trains always have seat assignments, so their direction output does not need to change other than displaying the appropriate seat number.

## Requirements

PHP 7.0

## Installation

The application namespaces are managed by composer, the dependency management library.
You should install composer (you can follow the documentation here: https://getcomposer.org), and then run
`composer install` in the current directory.

## Execution

Run the following command:

`php sort /path/to/json/file.json`

This must be done in the current directory, as 'sort' is the console application filename.

## Running Tests

As you have installed composer, you are able to run the tests easily.
You can run them by executing:

`./vendor/bin/phpunit` in the current folder.