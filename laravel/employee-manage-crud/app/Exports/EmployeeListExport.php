<?php

namespace App\Exports;

use App\Model\EmployeeList;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeListExport implements FromCollection,WithHeadings
{

    public function collection()
    {
        $emplyee = DB::table('employee_lists as list')
            ->join('employee_salaries as salary', 'list.id', '=', 'salary.empID')
            ->whereNull('list.deleted_at')
            ->whereNull('salary.deleted_at')
            ->select(
                'list.fullname',
                'list.nickname',
                'list.gender',
                'list.dob',
                'list.phone',
                'list.email',
                'salary.salary',
                'salary.position',
                'salary.department',
                'salary.skyID'
            )
            ->get();
        return $emplyee;
    }

    public function headings(): array
    {
        return ["Fullname", "Nickname", "Gender", "Dirth Of Birth", "Phone", "Email", "Salary", "Position", "Department", "SkypeID"];
    }
    
}
