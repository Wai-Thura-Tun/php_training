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
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

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

    public function updateEmployeeList(EmployeeSubmitRequest $request, $id)
    {
        $validated = $request->validated();
        $this->employee->updateEmployeeById($validated, $id);
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

    /**
     * Summary of searchEmployeeList
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function searchEmployeeList() {
        $value = request()->query('search');
        $employee = $this->employee->searchEmployee($value);
        $employee->withPath('/search-employee?search='.$value,request()->query('search'),'&');
        return view('index', compact('employee'));
    }

    /**
     * Summary of sendmail
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function sendmail(Request $request) {
        $this->employee->sendToMail($request);
        return view('complete');
    }

    /**
     * Summary of createEmployee
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function createEmployee() {
        return view('input');
    }

    /**
     * Summary of importEmployeeView
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function importEmployeeView() {
        return view('file');
    }

    /**
     * Summary of showApiIndex
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showApiIndex() {
        return view('api/index');
    }

    /**
     * Summary of editApiData
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function editApiData($id) {
        $editData = $id;
        return view('api/input', compact('editData'));
    }

    /**
     * Summary of createApiData
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function createApiData() {
        return view('api/input');
    }

    /**
     * Summary of showApiMail
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showApiMail() {
        return view('api/mailform');
    }

    /**
     * Summary of showEmployeeMail
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    
    public function showEmployeeMail() {
        return view('mailform');
    }
}
