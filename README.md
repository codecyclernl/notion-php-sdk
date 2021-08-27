# Notion PHP SDK

<img src="https://github.com/codecyclernl/notion-php-sdk/raw/main/banner.png" />

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codecycler/notion.svg?style=flat-square)](https://packagist.org/packages/codecycler/notion)
[![Total Downloads](https://img.shields.io/packagist/dt/codecycler/notion.svg?style=flat-square)](https://packagist.org/packages/codecycler/notion)

---
This is an unofficial PHP SDK for the new public Notion API. It's work in progress as we didn't get the change to be included to the private beta.

## Installation

You can install the package via composer:

```bash
composer require codecycler/notion
```

## Usage

### Getting all databases attached  to your integration.
```php
use Notion\Notion;

$databaseOptions = new Notion($token)
    ->database()
    ->ids();
```

### Querying a database by id
```php
use Notion\Notion;

$databaseOptions = new Notion($token)
    ->database($databaseId)
    ->query()
    ->get();
```

### Query database by property
```php
$nameFilter = (new Notion\Filters\TextFilter())
    ->equals('Name', 'Notion is awesome!');

$database = $client->database('e3161af3-ff12-43c5-9f42-02eea4ab4cbf')
  ->query()
  ->filter($nameFilter)
  ->get();

foreach ($database->pages as $page) {
  $name = $page->name;
  $status = $page->status;
}
```

### Getting a page by id
```php
$page = $client->page('9b0ff081-1af8-4751-92d6-9e07fbd5c20d')->get();

$name           = $page->name;          // Property: 'Name'
$showOnWebsite  = $page->showOnWebsite; // Property: 'Show on website'
```

### Creating a new page in a database
```php
$database = $client->database('e3161af3-ff12-43c5-9f42-02eea4ab4cbf')->get();

$page = $database->newPage();

$page->name = 'New page created with the Notion API';
$page->showOnWebsite = true;

$page->save();
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
