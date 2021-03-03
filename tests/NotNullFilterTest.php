<?php

namespace Grixu\QueryBuilderFilters\Tests;

use Grixu\QueryBuilderFilters\NotNullFilter;
use Grixu\QueryBuilderFilters\Tests\Helpers\TestModel;
use Orchestra\Testbench\TestCase;

class NotNullFilterTest extends TestCase
{
    protected $query;
    protected $preSql;
    protected $obj;

    protected function setUp(): void
    {
        parent::setUp();

        $this->query = TestModel::query();
        $this->preSql = $this->query->toSql();
        $this->obj = new NotNullFilter();
    }

    /** @test */
    public function is_sql_generated()
    {
        $obj = $this->obj;
        $obj($this->query, 'field', '');

        $this->basicAssertions();
        $this->assertStringContainsString('field', $this->query->toSql());
    }

    protected function basicAssertions()
    {
        $this->assertNotEquals($this->preSql, $this->query->toSql());
        $this->assertStringContainsString('is not null', $this->query->toSql());
        $this->assertStringNotContainsString('is null', $this->query->toSql());
        $this->assertNotEmpty($this->query->getBindings());
    }

    /** @test */
    public function is_sql_generated_with_many_fields()
    {
        $testData = ['field', 'another_field'];

        $obj = $this->obj;
        $obj($this->query, $testData, '');

        $this->basicAssertions();

        foreach ($testData as $test) {
            $this->assertStringContainsString($test, $this->query->toSql());
        }
    }
}
