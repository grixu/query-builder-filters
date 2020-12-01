<?php

namespace Grixu\QueryBuilderFilters\Tests;

use Grixu\QueryBuilderFilters\StartsWithFilter;
use Grixu\QueryBuilderFilters\Tests\Helpers\TestModel;
use Orchestra\Testbench\TestCase;

class StartsWithFilterTest extends TestCase
{
    /** @test */
    public function is_sql_generated()
    {
        $query = TestModel::query();

        $preSql = $query->toSql();

        $obj = new StartsWithFilter();
        $obj($query, '93', 'index');

        $this->assertNotEquals($preSql, $query->toSql());
        $this->assertStringContainsString('index', $query->toSql());
        $this->assertStringContainsString('like', $query->toSql());
        $this->assertNotEmpty($query->getBindings());
        $this->assertEquals(true, in_array('93%', $query->getBindings()));
        $this->assertEquals(false, in_array('93', $query->getBindings()));
    }
}
