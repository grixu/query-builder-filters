<?php

namespace Grixu\QueryBuilderFilters\Tests;

use Grixu\QueryBuilderFilters\DateBeforeFilter;
use Grixu\QueryBuilderFilters\Tests\Helpers\TestModel;
use Orchestra\Testbench\TestCase;

class DateBeforeFilterTest extends TestCase
{
    /** @test */
    public function is_sql_generated()
    {
        $query = TestModel::query();

        $preSql = $query->toSql();

        $obj = new DateBeforeFilter();
        $obj($query, '2020-12-01', 'timestamp');

        $this->assertNotEquals($preSql, $query->toSql());
        $this->assertStringContainsString('timestamp', $query->toSql());
        $this->assertStringContainsString('<=', $query->toSql());
        $this->assertNotEmpty($query->getBindings());
        $this->assertEquals(true, in_array('2020-12-01', $query->getBindings()));
    }
}
