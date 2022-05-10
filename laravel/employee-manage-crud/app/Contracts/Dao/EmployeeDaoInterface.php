<?php
namespace App\Contracts\Dao;
use Illuminate\Http\Request;
interface EmployeeDaoInterface {

  public function getEmployee();
  public function saveEmployee($validated);
  public function editEmployeeById($id);
  public function updateEmployeeById($validated, $id,$eid);
  public function deleteEmployeeById($id);
  public function exportEmployee();
  public function importEmployee($validated);
  public function searchEmployee($text);
}