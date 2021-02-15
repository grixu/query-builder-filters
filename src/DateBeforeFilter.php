<?php

namespace Grixu\QueryBuilderFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class DateBeforeFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->whereDate($property, '<=', $value);
    }
}
