<?php

namespace App\Repositories\traits;

use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\DB;

/**
 * RawHelpers
 */
trait RawHelpers
{
    /**
     * Raw Query
     *
     * @param string $query
     * @return Expression
     */
    protected function raw(string $query): Expression
    {
        return DB::raw($query);
    }

    /**
     * FIELD function of SQL
     *
     * @param string $column
     * @param array $values
     * @return Expression
     */
    protected function field(string $column, array $values): Expression
    {
        return $this->raw("FIELD($column, '" . implode("', '", $values) . '\')');
    }

    /**
     * Count and distinct function of SQL
     *
     * @param string $column
     * @return Expression
     */
    protected function countDistinct(string $column): Expression
    {
        return $this->raw("COUNT(DISTINCT($column))");
    }
}
