<?php

namespace Grixu\QueryBuilderFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class DateBetweenFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->whereDate($property, '>=', $value[0])
            ->whereDate($property, '<=', $value[1]);
    }
}
