<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\Services\EmployeeServiceInterface;
use App\Http\Requests\EmployeeSubmitRequest;

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
}
