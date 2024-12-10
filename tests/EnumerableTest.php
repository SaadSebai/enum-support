<?php

use Illuminate\Support\Facades\Lang;
use Saad\EnumSupport\Enumerable;

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
    expect(UserRole::getByName('ADMIN'))->toBe(UserRole::ADMIN)
        ->and(UserRole::getByName('invalid'))->toBeNull();
});

it('retrieves an enum by value', function () {
    expect(UserRole::getByValue('admin'))->toBe(UserRole::ADMIN)
        ->and(UserRole::getByValue('invalid'))->toBeNull();
});