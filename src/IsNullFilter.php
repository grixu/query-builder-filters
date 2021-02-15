<?php

namespace Grixu\QueryBuilderFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class IsNullFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->where(function($query) {
            return $query->orWhereNull('ean')
                ->orWhere('ean', '');
        });
    }
}
