# Query Builder Filters

Set of filters for laravel-query-builder (made by Spatie)

## Installation

You can install the package via composer:

```bash
composer require grixu/query-builder-filters
```

## Usage

This is package is bunch of filters to sue with great package made by [Spatie](https://github.com/spatie): [laravel-query-builder](https://github.com/spatie/laravel-query-builder). Below you can see an examples how to use each of 10 filters from this package.

#### DateAfterField, DateBeforeFilter, DateBetweenFilter
```php
use Grixu\QueryBuilderFilters\DateAfterFilter;
use Grixu\QueryBuilderFilters\DateBeforeFilter;
use Grixu\QueryBuilderFilters\DateBetweenFilter;

// In your Controller or HttpQueryBuilder class for the following request:
// GET /users?filter[date_after]=2020-12-01
// GET /users?filter[date_before]=2020-12-01
// GET /users?filter[date_between]=2020-11-01,2020-12-01
$users = QueryBuilder::for(User::class)
    ->allowedFilters([
        AllowedFilter::custom('date_after', new DateAfterFilter(), 'date_field_name'),
        AllowedFilter::custom('date_before', new DateBeforeFilter(), 'date_field_name'),
        AllowedFilter::custom('date_between', new DateBetweenFilter(), 'date_field_name'),
    ])
    ->get();
```

#### GreaterThanFilter, GreaterOrEqualThanFilter, LowerThanFilter, LowerOrEqualThanFilter
```php
use Grixu\QueryBuilderFilters\GreaterThanFilter;
use Grixu\QueryBuilderFilters\GreaterOrEqualThanFilter;
use Grixu\QueryBuilderFilters\LowerThanFilter;
use Grixu\QueryBuilderFilters\LowerOrEqualThanFilter;

// GET /users?filter[field_gt]=100
// GET /users?filter[field_gte]=100
// GET /users?filter[field_lt]=100
// GET /users?filter[field_lte]=100
$users = QueryBuilder::for(User::class)
    ->allowedFilters([
        AllowedFilter::custom('field_gt', new GreaterThanFilter(), 'field'),
        AllowedFilter::custom('field_gte', new GreaterOrEqualThanFilter(), 'field'),
        AllowedFilter::custom('field_lt', new LowerThanFilter(), 'field'),
        AllowedFilter::custom('field_lte', new LowerOrEqualThanFilter(), 'field'),
    ])
    ->get();
```

#### StartsWithFilter
```php
use Grixu\QueryBuilderFilters\StartsWithFilter;

// GET /users?filter[some]=93
$users = QueryBuilder::for(User::class)
    ->allowedFilters([
        AllowedFilter::custom('some', new StartsWithFilter(), 'some'),
    ])
    ->get();
```

#### IsNullFilter, NotNullFilter
```php
use Grixu\QueryBuilderFilters\IsNullFilter;
use Grixu\QueryBuilderFilters\NotNullFilter;

// GET /users?filter[not_null]=some_field
// GET /users?filter[is_null]=some_field
$users = QueryBuilder::for(User::class)
    ->allowedFilters([
        AllowedFilter::custom('is_null', new IsNullFilter()),
        AllowedFilter::custom('not_null', new NotNullFilter()),
    ])
    ->get();
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email mateusz.gostanski@gmail.com instead of using the issue tracker.

## Credits

- [Mateusz Gostański](https://github.com/grixu)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
