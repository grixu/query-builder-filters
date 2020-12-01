<?php

namespace Grixu\QueryBuilderFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

/**
 * Class NotNullFilter
 * @package Support\CustomFilters
 */
class NotNullFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->whereNotNull($value);
    }
}
