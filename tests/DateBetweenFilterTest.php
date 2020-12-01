<?php

namespace Grixu\QueryBuilderFilters\Tests;

use Grixu\QueryBuilderFilters\DateBetweenFilter;
use Grixu\QueryBuilderFilters\Tests\Helpers\TestModel;
use Orchestra\Testbench\TestCase;

class DateBetweenFilterTest extends TestCase
{
    /** @test */
    public function is_sql_generated()
    {
        $query = TestModel::query();

        $preSql = $query->toSql();

        $obj = new DateBetweenFilter();
        $obj($query, ['2020-11-01', '2020-12-01'], 'another_date');

        $this->assertNotEquals($preSql, $query->toSql());
        $this->assertStringContainsString('another_date', $query->toSql());
        $this->assertStringContainsString('>=', $query->toSql());
        $this->assertStringContainsString('<=', $query->toSql());
        $this->assertNotEmpty($query->getBindings());
        $this->assertEquals(true, in_array('2020-12-01', $query->getBindings()));
        $this->assertEquals(true, in_array('2020-11-01', $query->getBindings()));
    }
}
