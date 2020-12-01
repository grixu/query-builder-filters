<?php

namespace Grixu\QueryBuilderFilters\Tests;

use Grixu\QueryBuilderFilters\DateAfterFilter;
use Grixu\QueryBuilderFilters\Tests\Helpers\TestModel;
use Orchestra\Testbench\TestCase;

class DateAfterFilterTest extends TestCase
{
    /** @test */
    public function is_sql_generated()
    {
        $query = TestModel::query();

        $preSql = $query->toSql();

        $obj = new DateAfterFilter();
        $obj($query, '2020-12-01', 'field');

        $this->assertNotEquals($preSql, $query->toSql());
        $this->assertStringContainsString('field', $query->toSql());
        $this->assertStringContainsString('>=', $query->toSql());
        $this->assertNotEmpty($query->getBindings());
        $this->assertEquals(true, in_array('2020-12-01', $query->getBindings()));
    }
}
