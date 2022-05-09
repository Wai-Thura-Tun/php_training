<?php

namespace App\Imports;

use App\Model\EmployeeSalary;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EmployeeSalaryImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $lastEmpSalary = EmployeeSalary::orderBy('sid', 'desc')->first();
        return new EmployeeSalary([
            'empID' => ($lastEmpSalary->empID ?? 0) + 1,
            'salary' => $row[6],
            'position' => $row[7],
            'department' => $row[8],
            'skyID' => $row[9],
        ]);
    }
    
    public function startRow(): int
    {
        return 2;
    }

}
