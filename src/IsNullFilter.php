<?php

namespace Grixu\QueryBuilderFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

/**
 * Class IsNullFilter
 * @package Support\CustomFilters
 */
class IsNullFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->whereNull($value);
    }
}
