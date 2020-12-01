<?php

namespace Grixu\QueryBuilderFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

/**
 * Class LowerOrEqualThanFiler
 * @package Support\CustomFilters
 */
class LowerOrEqualThanFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->where($property, '<=', $value);
    }
}
