<?php

namespace Grixu\QueryBuilderFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class GreaterOrEqualThanFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        return $query->where($property, '>=', $value);
    }
}
