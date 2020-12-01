<?php

namespace Grixu\QueryBuilderFilters\Tests;

use Grixu\QueryBuilderFilters\IsNullFilter;
use Grixu\QueryBuilderFilters\Tests\Helpers\TestModel;
use Orchestra\Testbench\TestCase;

class IsNullFilterTest extends TestCase
{
    /** @test */
    public function is_sql_generated()
    {
        $query = TestModel::query();

        $preSql = $query->toSql();

        $obj = new IsNullFilter();
        $obj($query, 'another_flag', 'another_flag');

        $this->assertNotEquals($preSql, $query->toSql());
        $this->assertStringContainsString('another_flag', $query->toSql());
        $this->assertStringContainsString('is null', $query->toSql());
        $this->assertStringNotContainsString('is not null', $query->toSql());
        $this->assertEmpty($query->getBindings());
    }
}
