# Diffy PHP Bindings

The Diffy PHP library provides convenient access to the Diffy API from applications written in PHP language.

## Requirements

PHP 7.1 and later.

## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require diffywebsite/diffy-php
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```

## Getting Started

Simple usage looks like:

```php
\Diffy\Diffy::setApiKey('c31fec8e123e479e75d46744c13a7d91');

print_r(\Diffy\Screenshot::create(132, 'production'));
```

See examples.php file for more examples.

## Environment

By default the client talks to production (`app.diffy.website`). To use a different
Diffy environment (e.g. staging), set the `DIFFY_API_HOST` environment variable to its hostname:

```bash
export DIFFY_API_HOST=staging.diffy.website
```

API calls then go to `https://<host>/api/`. Remember to use an API key created in that environment.

## Documentation

See the [Diffy REST API Swagger](https://app.diffy.website/rest).
