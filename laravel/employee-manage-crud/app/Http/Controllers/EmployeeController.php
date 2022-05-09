<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\Services\EmployeeServiceInterface;
use App\Exports\EmployeeListExport;
use App\Http\Requests\EmployeeSubmitRequest;
use App\Http\Requests\ExcelValidationRequest;
use App\Imports\EmployeeListImport;
use App\Imports\EmployeeSalaryImport;

class EmployeeController extends Controller
{
    /**
     * Summary of 
     * @var mixed
     */
    private $employee;

    /**
     * Summary of __construct
     * @param EmployeeServiceInterface $emplyeeService
     */

    public function __construct(EmployeeServiceInterface $emplyeeService)
    {
        $this->employee = $emplyeeService;
    }

    /**
     * Summary of showEmployeeList
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showEmployeeList()
    {
        $employeeList = $this->employee->getEmployee();
        return view('index', compact('employeeList'));
    }

    /**
     * Summary of addEmployeeList
     * @param EmployeeSubmitRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function addEmployeeList(EmployeeSubmitRequest $request)
    {
        $validated = $request->validated();
        $this->employee->saveEmployee($validated);
        return redirect('/');
    }

    /**
     * Summary of editEmployeeList
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function editEmployeeList($id)
    {
        $editData = $this->employee->editEmployeeById($id);
        return view('input', compact('editData'));
    }

    /**
     * Summary of updateEmployeeList
     * @param EmployeeSubmitRequest $request
     * @param mixed $id
     * @param mixed $eid
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function updateEmployeeList(EmployeeSubmitRequest $request, $id, $eid)
    {
        $validated = $request->validated();
        $this->employee->updateEmployeeById($validated, $id, $eid);
        return redirect('/');
    }

    /**
     * Summary of deleteEmployeeList
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function deleteEmployeeList($id)
    {
        $this->employee->deleteEmployeeById($id);
        return redirect('/');
    }

    /**
     * Summary of export
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function export() 
    {
        return $this->employee->exportEmployee();
    }

     /**
      * Summary of import
      * @param ExcelValidationRequest $request
      * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
      */

    public function import(ExcelValidationRequest $request)
    {
        $validated = $request->validated();
        $this->employee->importEmployee($validated);
        return redirect('/');
    }
}
