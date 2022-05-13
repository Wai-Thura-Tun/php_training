<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface EmployeeServiceInterface
{
  public function getEmployee();
  public function saveEmployee($validated);
  public function editEmployeeById($id);
  public function updateEmployeeById($validated, $id);
  public function deleteEmployeeById($id);
  public function exportEmployee();
  public function importEmployee($validated);
  public function searchEmployee($text);
  public function fetchAllFromApi();
  public function fetchItemFromApi($id);
  public function sendToMail(Request $request);
}
