# Freemius (WordPress SDK) Stubs

[![Packagist stats](https://img.shields.io/packagist/dt/mralaminahamed/freemius-stubs.svg)](https://packagist.org/packages/mralaminahamed/freemius-stubs/stats)
[![Packagist](https://img.shields.io/packagist/v/mralaminahamed/freemius-stubs.svg?color=4CC61E&style=popout)](https://packagist.org/packages/mralaminahamed/freemius-stubs)
[![Tweet](https://img.shields.io/badge/Tweet-share-d5d5d5?style=social&logo=twitter)](https://twitter.com/intent/tweet?text=https%3A%2F%2Fgithub.com%2Fmralaminahamed%2Fphpstan-freemius-stubs&url=I%20use%20mralaminahamed%2Fphpstan-freemius-stubs%20for%20IDE%20completion%20and%20static%20analysis)

This package provides stub declarations for the [Freemius WordPress SDK plugin](https://github.com/freemius/wordpress-sdk)
functions, classes and interfaces.
These stubs can help plugin and theme developers leverage IDE completion
and static analysis tools like [PHPStan](https://github.com/phpstan/phpstan).

The stubs are generated directly from the [source](https://github.com/freemius/wordpress-sdk)
using [php-stubs/generator](https://github.com/php-stubs/generator).

## Requirements

- PHP >=7.1

## Installation

Require this package as a development dependency with [Composer](https://getcomposer.org).

```bash
composer require --dev mralaminahamed/freemius-stubs
```

Alternatively you may download `freemius-stubs.php` directly.

## Usage in PHPStan

Include stubs in PHPStan configuration file.

```yaml
parameters:
    bootstrapFiles:
        - vendor/mralaminahamed/freemius-stubs/freemius-constants-stubs.php
        - vendor/mralaminahamed/freemius-stubs/freemius-stubs.php
```
