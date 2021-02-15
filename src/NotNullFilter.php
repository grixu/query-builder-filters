<?php

namespace Grixu\QueryBuilderFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class NotNullFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->where(function($query) {
            return $query->whereNotNull('ean')
                ->where('ean', '!=', '');
        });
    }
}
