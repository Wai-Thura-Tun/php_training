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
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class EmployeeDao implements EmployeeDaoInterface
{
    /**
     * Summary of getEmployee
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getEmployee()
    {
        $emplyee = EmployeeList::paginate(2);
        return $emplyee;
    }

     /**
      * Summary of saveEmployee
      * @param mixed $validated
      * @return EmployeeList
      */

    public function saveEmployee($validated)
    {
        $emplyList = new EmployeeList();
        $lastList = EmployeeList::latest()->first();
        $emplyList->fullname = $validated['fname'];
        $emplyList->nickname = $validated['nname'];
        $emplyList->gender = $validated['gender'];
        $emplyList->dob = $validated['dob'];
        $emplyList->phone = $validated['phone'];
        $emplyList->email = $validated['email'];  
        $emplyList->save();      
        $emplySalary = new EmployeeSalary();
        $emplySalary->empID = $lastList->id + 1;
        $emplySalary->salary = $validated['salary'];
        $emplySalary->position = $validated['position'];
        $emplySalary->department = $validated['depart'];
        $emplySalary->skyID = $validated['skype'];
        $emplyList->salary()->save($emplySalary);
        return $emplyList;
    }

    /**
     * Summary of editEmployeeById
     * @param int $id
     * @return \Illuminate\Support\Collection
     */

    public function editEmployeeById($id)
    {
        $editEmployee = EmployeeList::find($id);
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
        $epList->salary()->delete();
        $epList->delete();
        return $epList;
    }

    /**
     * Summary of updateEmployeeById
     * @param mixed $validated
     * @param mixed $id
     * @param mixed $eid
     * @return array (updated Object)
     */

    public function updateEmployeeById($validated, $id)
    {
        $emplyList = EmployeeList::find($id);
        $emplyList->fullname = $validated['fname'];
        $emplyList->nickname = $validated['nname'];
        $emplyList->gender = $validated['gender'];
        $emplyList->dob = $validated['dob'];
        $emplyList->phone = $validated['phone'];
        $emplyList->email = $validated['email'];
        $emplyList->save();
        $emplyList->salary()->update([
            'salary' => $validated['salary'],
            'position' => $validated['position'],
            'department' => $validated['depart'],
            'skyID' => $validated['skype']
        ]);
        return $emplyList;
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

    /**
     * Summary of paginate
     * @param mixed $items
     * @param mixed $perPage
     * @param mixed $page
     * @param mixed $options
     * @return LengthAwarePaginator
     */

    public function paginate($items, $perPage = 1, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    /**
     * Summary of searchEmployee
     * @param mixed $text
     * @return LengthAwarePaginator
     */

    public function searchEmployee($text)
    {
        $employee = DB::select(DB::raw(
            "SELECT * FROM employee_lists as list INNER JOIN employee_salaries as salary ON 
            list.id=salary.empID WHERE
            list.fullname LIKE CONCAT(:fvalue,'%') OR
            salary.position LIKE CONCAT(:pvalue,'%') OR
            salary.department LIKE CONCAT(:dvalue,'%') AND
            list.deleted_at is NULL AND 
            salary.deleted_at is NULL"
        ), array(
            'fvalue' => $text,
            'pvalue' => $text,
            'dvalue' => $text,
        ));
        $employeeData = $this->paginate($employee);
        return $employeeData;
    }

    //API
    /**
     * Summary of fetchAllFromApi
     * @return array<array>
     */

    public function fetchAllFromApi()
    {
        $employee = EmployeeList::all();
        $data = [];
        foreach ($employee as $key) {
            $json['id'] = $key->id;
            $json['fullname'] = $key->fullname;
            $json['nickname'] = $key->nickname;
            $json['gender'] = $key->gender;
            $json['dob'] = $key->dob;
            $json['phone'] = $key->phone;
            $json['email'] = $key->email;
            $json['empDetail'] = [
                'empID' => $key->salary->empID,
                'salary' => $key->salary->salary,
                'position' => $key->salary->position,
                'department' => $key->salary->department,
                'skypeID' => $key->salary->skyID,
            ];

            $data['employee' . $key->id] = $json;
        }
        return $data;
    }

     /**
      * Summary of fetchItemFromApi
      * @param mixed $id
      * @return array
      */

    public function fetchItemFromApi($id)
    {
        $emplyeeID = EmployeeList::find($id);
        if (!$emplyeeID) {
            return ["message" => "employee not found"];
        }
        $data = [];
            $json['id'] = $emplyeeID->id;
            $json['fullname'] = $emplyeeID->fullname;
            $json['nickname'] = $emplyeeID->nickname;
            $json['gender'] = $emplyeeID->gender;
            $json['dob'] = $emplyeeID->dob;
            $json['phone'] = $emplyeeID->phone;
            $json['email'] = $emplyeeID->email;
            $json['empDetail'] = [
                'empID' => $emplyeeID->salary->empID,
                'salary' => $emplyeeID->salary->salary,
                'position' => $emplyeeID->salary->position,
                'department' => $emplyeeID->salary->department,
                'skypeID' => $emplyeeID->salary->skyID,
            ];
        $data['employee' . $emplyeeID->id] = $json;
        return $data;
    }

    public function getDataToMail() {
        $employee = EmployeeList::latest()->take(5)->get();
        return $employee;
    }
    
}
