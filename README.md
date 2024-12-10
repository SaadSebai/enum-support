# Laravel Enumerable Trait Package

A lightweight and easy-to-use package for extending PHP enumerations with additional functionality in your Laravel projects.

---

## Features

This package adds the following functionality to PHP enums using the `Enumerable` trait:

- Retrieve all enum values (`values()`).
- Retrieve all enum names (`names()`).
- Get an enum case by name (`getByName()`).
- Get an enum case by value (`getByValue()`).
- Translate an enum (`translate()`).

---

## Installation

To use this package, add it to your Laravel project with Composer:

```bash
composer require saadsebai/enum-support
```

## Usage

### 1. Create an Enum

The Enumerable trait can be added to any PHP enum to extend its functionality. Here’s an example:

```php
namespace App\Enums;

use Saad\EnumSupport\Traits\Enums\Enumerable;

enum UserRole: string
{
    use Enumerable; // Add the trait to your enum.

    case ADMIN = 'admin';
    case EDITOR = 'editor';
    case VIEWER = 'viewer';
}
```
### 2. Use the Enum

- Get an array of all the enum values:
```php
UserRole::values(); // ['admin', 'editor', 'viewer']
```

- Get an array of all the enum names:
```php
UserRole::names(); // ['ADMIN', 'EDITOR', 'VIEWER']
```

- Retrieve a specific enum case by its name:
```php
UserRole::getByName('ADMIN'); // Returns UserRole::ADMIN
UserRole::getByName('invalid'); // Returns null
```

- Retrieve a specific enum case by its value:
```php
UserRole::getByValue('admin'); // Returns UserRole::ADMIN
UserRole::getByValue('invalid'); // Returns null
```

- Translate an enum:
> ⚠ **Warning**: Before using the `translate()` function, you must create the corresponding translation file. This file should contain the keys and values for the enum cases in the specified language.

```php
UserRole::ADMIN->translate('role'); // Returns the translation of the enum value using the giving translation file path.
```


## Testing

This package uses **Pest** for testing. To run the tests, use the following command:

```bash
php vendor/bin/pest
```

### Example Tests

Below is an example of how the `Enumerable` trait is tested:

#### Test File: `tests/Feature/EnumerableTest.php`
```php
<?php

use Saad\EnumSupport\Traits\Enums\Enumerable;

enum UserRole: string
{
    use Enumerable;

    case ADMIN = 'admin';
    case EDITOR = 'editor';
    case VIEWER = 'viewer';
}

it('returns all enum values', function () {
    expect(UserRole::values())->toBe(['admin', 'editor', 'viewer']);
});

it('returns all enum names', function () {
    expect(UserRole::names())->toBe(['ADMIN', 'EDITOR', 'VIEWER']);
});

it('retrieves an enum by name', function () {
    expect(UserRole::getByName('ADMIN'))->toBe(UserRole::ADMIN);
    expect(UserRole::getByName('invalid'))->toBeNull();
});

it('retrieves an enum by value', function () {
    expect(UserRole::getByValue('admin'))->toBe(UserRole::ADMIN);
    expect(UserRole::getByValue('invalid'))->toBeNull();
});
```
---