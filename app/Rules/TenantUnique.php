<?php

namespace App\Rules;

use App\Tenant\ManagerTenant;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class TenantUnique implements Rule
{
    private $table, $column, $columnValue;
    public function __construct($table, $columnValue = null, $column = 'id')
    {
        $this->table = $table;
        $this->column = $column;
        $this->columnValue = $columnValue;
    }

    public function passes($attribute, $value)
    {
        $tenant = app(ManagerTenant::class)->getTenantIdentify();
        $result = DB::table($this->table)
                    ->where($attribute, ucfirst(strtolower($value)))
                    ->where('tenant_id', $tenant)
                    ->first();
        if ($result && $result->{$this->column} == $this->columnValue)
            return true;
        return is_null($result);
    }

    public function message()
    {
        return 'O valor para :attribute já está em uso.';
    }
}
