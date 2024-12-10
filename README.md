# Laravel Enumerable Trait Package

A lightweight and easy-to-use package for extending PHP enumerations with additional functionality in your Laravel projects.

---

## Features

This package adds the following functionality to PHP enums using the `Enumerable` trait:

- Retrieve all enum values (`values()`).
- Retrieve all enum names (`names()`).
- Get an enum case by name (`getByName()`).
- Get an enum case by value (`getByValue()`).

---

## Installation

To use this package, add it to your Laravel project with Composer:

```bash
composer require saad/enum-support
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

Get an array of all the enum values:
```php
UserRole::values(); // ['admin', 'editor', 'viewer']
```

Get an array of all the enum names:
```php
UserRole::names(); // ['ADMIN', 'EDITOR', 'VIEWER']
```

Retrieve a specific enum case by its name:
```php
UserRole::getByName('admin'); // Returns UserRole::ADMIN
UserRole::getByName('invalid'); // Returns null
```

Retrieve a specific enum case by its value:
```php
UserRole::getByValue('admin'); // Returns UserRole::ADMIN
UserRole::getByValue('invalid'); // Returns null
```