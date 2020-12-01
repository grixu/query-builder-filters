<?php

namespace Grixu\QueryBuilderFilters\Tests;

use Grixu\QueryBuilderFilters\GreaterThanFilter;
use Grixu\QueryBuilderFilters\Tests\Helpers\TestModel;
use Orchestra\Testbench\TestCase;

class GreaterThanFilterTest extends TestCase
{
    /** @test */
    public function is_sql_generated()
    {
        $query = TestModel::query();

        $preSql = $query->toSql();

        $obj = new GreaterThanFilter();
        $obj($query, 100, 'amount');

        $this->assertNotEquals($preSql, $query->toSql());
        $this->assertStringContainsString('amount', $query->toSql());
        $this->assertStringContainsString('>', $query->toSql());
        $this->assertStringNotContainsString('>=', $query->toSql());
        $this->assertNotEmpty($query->getBindings());
        $this->assertEquals(true, in_array('100', $query->getBindings()));
    }
}
