# Notion PHP SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codecycler/notion.svg?style=flat-square)](https://packagist.org/packages/codecycler/notion)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/codecycler/notion/run-tests?label=tests)](https://github.com/codecycler/notion/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/codecycler/notion/Check%20&%20fix%20styling?label=code%20style)](https://github.com/codecycler/notion/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/codecycler/notion.svg?style=flat-square)](https://packagist.org/packages/codecycler/notion)

---
This is an unofficial PHP SDK for the new public Notion API. It's work in progress as we didn't get the change to be included to the private beta.

## Installation

You can install the package via composer:

```bash
composer require codecycler/notion
```

## Usage

Getting all databases attached  to your integration.
```php
use Notion\Notion;

$databaseOptions = new Notion($token)
    ->database()
    ->ids();
```

Querying a database by id
```php
use Notion\Notion;

$databaseOptions = new Notion($token)
    ->database($databaseId)
    ->query()
    ->get();
```

Query database by property (WIP)
```php
$response = $client->database('e3161af3-ff12-43c5-9f42-02eea4ab4cbf')
  ->query()
  ->where('Show on website', 'checkbox', 'equals', true)
  ->get()
  ->toArray();

foreach ($response['json']->results as $page) {
  ray($page->properties->Name->title[0]->plain_text);
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Sebastiaan Kloos](https://github.com/codecyclernl)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
