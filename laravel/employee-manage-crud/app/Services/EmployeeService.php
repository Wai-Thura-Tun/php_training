<?php

namespace App\Services;

use App\Contracts\Services\EmployeeServiceInterface;
use App\Contracts\Dao\EmployeeDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function updateEmployeeById($validated, $id, $eid)
    {
        return $this->employeeService->updateEmployeeById($validated, $id, $eid);
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
}
