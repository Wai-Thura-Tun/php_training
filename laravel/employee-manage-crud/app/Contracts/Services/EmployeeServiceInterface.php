<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface EmployeeServiceInterface
{
  public function getEmployee();
  public function saveEmployee($validated);
  public function editEmployeeById($id);
  public function updateEmployeeById($validated, $id, $eid);
  public function deleteEmployeeById($id);
  public function exportEmployee();
  public function importEmployee($validated);
}
