<?php

namespace App\Services;

use App\Contracts\Services\EmployeeServiceInterface;
use App\Contracts\Dao\EmployeeDaoInterface;
use App\Mail\EmployeeMail;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Mail;
class EmployeeService implements EmployeeServiceInterface
{
    private $employeeService;

    /**
     * Summary of __construct
     * @param EmployeeDaoInterface $employeeService
     */

    public function __construct(EmployeeDaoInterface $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * Summary of getEmployee
     * @return \Illuminate\Support\Collection
     */

    public function getEmployee()
    {
        return $this->employeeService->getEmployee();
    }

    /**
     * Summary of saveEmployee
     * @param mixed $validated
     * @return array (Saved Object)
     */

    public function saveEmployee($validated)
    {
        return $this->employeeService->saveEmployee($validated);
    }

    /**
     * Summary of editEmployeeById
     * @param int $id
     * @return \Illuminate\Support\Collection
     */

    public function editEmployeeById($id)
    {
        return $this->employeeService->editEmployeeById($id);
    }

    /**
     * Summary of deleteEmployeeById
     * @param mixed $id
     * @return array (Deleted Object)
     */

    public function deleteEmployeeById($id)
    {
        return $this->employeeService->deleteEmployeeById($id);
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
        return $this->employeeService->updateEmployeeById($validated, $id);
    }

    /**
     * Summary of export
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function exportEmployee()
    {
        return $this->employeeService->exportEmployee();
    }

    /**
     * Summary of importEmployee
     * @param mixed $validated
     * @return array
     */

    public function importEmployee($validated)
    {
        return $this->employeeService->importEmployee($validated);
    }

    /**
     * Summary of searchEmployee
     * @param mixed $text
     * @return LengthAwarePaginator
     */


    public function searchEmployee($text)
    {
        return $this->employeeService->searchEmployee($text);
    }

    //API
    /**
     * Summary of fetchAllFromApi
     * @return array<array>
     */

    public function fetchAllFromApi()
    {
        return $this->employeeService->fetchAllFromApi();
    }

    /**
     * Summary of fetchItemFromApi
     * @param mixed $id
     * @return array<array>
     */

    public function fetchItemFromApi($id)
    {
        return $this->employeeService->fetchItemFromApi($id);
    }

    public function sendToMail(Request $request)
    {
        $data = $this->employeeService->getDataToMail();
        $details = ["title" => "Employee List", "body" => "The latest 5 Employee List is Below", "data" => $data];
        return Mail::to($request->mail)->send(new EmployeeMail($details));
    }

}
