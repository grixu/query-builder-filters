<?php

namespace Grixu\QueryBuilderFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

/**
 * Class LowerThanFilter
 * @package Support\CustomFilters
 */
class LowerThanFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->where($property, '<', $value);
    }
}
