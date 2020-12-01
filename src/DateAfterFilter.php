<?php

namespace Grixu\QueryBuilderFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

/**
 * Class DateAfterFilter
 * @package Support\CustomFilters
 */
class DateAfterFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->whereDate($property, '>=', $value);
    }
}
