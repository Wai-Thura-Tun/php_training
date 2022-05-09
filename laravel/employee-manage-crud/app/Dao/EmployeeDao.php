<?php

namespace App\Dao;

use Maatwebsite\Excel\Facades\Excel;
use App\Model\EmployeeList;
use App\Contracts\Dao\EmployeeDaoInterface;
use App\Exports\EmployeeListExport;
use App\Model\EmployeeSalary;
use App\Http\Controllers\EmployeeController;
use App\Imports\EmployeeListImport;
use App\Imports\EmployeeSalaryImport;
use Illuminate\Support\Facades\DB;

class EmployeeDao implements EmployeeDaoInterface
{
    /**
     * Summary of getEmployee
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getEmployee()
    {
        $emplyee = DB::table('employee_lists as list')
            ->join('employee_salaries as salary', 'list.id', '=', 'salary.empID')
            ->whereNull('list.deleted_at')
            ->whereNull('salary.deleted_at')
            ->paginate(2);
        return $emplyee;
    }

    /**
     * Summary of saveEmployee
     * @param mixed $validated
     * @return array (Saved Object)
     */

    public function saveEmployee($validated)
    {
        $emplyList = new EmployeeList();
        $emplySalary = new EmployeeSalary();
        $emplyList->fullname = $validated['fname'];
        $emplyList->nickname = $validated['nname'];
        $emplyList->gender = $validated['gender'];
        $emplyList->dob = $validated['dob'];
        $emplyList->phone = $validated['phone'];
        $emplyList->email = $validated['email'];
        $emplyList->save();
        $lastEList = DB::table('employee_lists')->latest()->first();
        $emplySalary->empID = $lastEList->id;
        $emplySalary->salary = $validated['salary'];
        $emplySalary->position = $validated['position'];
        $emplySalary->department = $validated['depart'];
        $emplySalary->skyID = $validated['skype'];
        $emplySalary->save();
        return [$emplyList, $emplySalary];
    }

    /**
     * Summary of editEmployeeById
     * @param int $id
     * @return \Illuminate\Support\Collection
     */

    public function editEmployeeById($id)
    {
        $editEmployee = DB::table('employee_lists as list')
            ->join('employee_salaries as salary', 'list.id', '=', 'salary.empID')
            ->where('list.id', '=', $id)
            ->get();
        return $editEmployee;
    }

    /**
     * Summary of deleteEmployeeById
     * @param mixed $id
     * @return array (Deleted Object)
     */

    public function deleteEmployeeById($id)
    {
        $epList = EmployeeList::find($id);
        $epList->delete();
        $epSalary = DB::table('employee_salaries')->where('empID', '=', $id)->update(array(
            'deleted_at' => now()
        ));
        return [$epList, $epSalary];
    }

    /**
     * Summary of updateEmployeeById
     * @param mixed $validated
     * @param mixed $id
     * @param mixed $eid
     * @return array (updated Object)
     */

    public function updateEmployeeById($validated, $id, $eid)
    {
        $emplyList = EmployeeList::find($id);
        $emplyList->fullname = $validated['fname'];
        $emplyList->nickname = $validated['nname'];
        $emplyList->gender = $validated['gender'];
        $emplyList->dob = $validated['dob'];
        $emplyList->phone = $validated['phone'];
        $emplyList->email = $validated['email'];
        $emplyList->save();
        $emplySalary = DB::table('employee_salaries')->where('sid', '=', $eid)
            ->update(array(
                'salary' => $validated['salary'],
                'position' => $validated['position'],
                'department' => $validated['depart'],
                'skyID' => $validated['skype'],
                'updated_at' => now()
            ));
        return [$emplyList, $emplySalary];
    }

    /**
     * Summary of exportEmployee
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    public function exportEmployee()
    {
        return Excel::download(new EmployeeListExport, 'employees.xlsx');
    }

    /**
     * Summary of importEmployee
     * @param mixed $validated
     * @return array
     */

    public function importEmployee($validated)
    {
        $empList = Excel::import(new EmployeeListImport, $validated['file']);
        $empSalary = Excel::import(new EmployeeSalaryImport, $validated['file']);
        return [$empSalary, $empList];
    }
}
