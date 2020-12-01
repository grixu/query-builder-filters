<?php

namespace Grixu\QueryBuilderFilters\Tests;

use Grixu\QueryBuilderFilters\NotNullFilter;
use Grixu\QueryBuilderFilters\Tests\Helpers\TestModel;
use Orchestra\Testbench\TestCase;

class NotNullFilterTest extends TestCase
{
    /** @test */
    public function is_sql_generated()
    {
        $query = TestModel::query();

        $preSql = $query->toSql();

        $obj = new NotNullFilter();
        $obj($query, 'some_flag', 'some_flag');

        $this->assertNotEquals($preSql, $query->toSql());
        $this->assertStringContainsString('some_flag', $query->toSql());
        $this->assertStringContainsString('is not null', $query->toSql());
        $this->assertStringNotContainsString('is null', $query->toSql());
        $this->assertEmpty($query->getBindings());
    }
}
