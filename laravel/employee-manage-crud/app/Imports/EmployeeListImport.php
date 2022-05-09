<?php

namespace App\Imports;

use App\Model\EmployeeSalary;
use App\Model\EmployeeList;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EmployeeListImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new EmployeeList([
            'fullname' => $row[0],
            'nickname' => $row[1],
            'gender' => $row[2],
            'dob' => $row[3],
            'phone' => $row[4],
            'email' => $row[5],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
