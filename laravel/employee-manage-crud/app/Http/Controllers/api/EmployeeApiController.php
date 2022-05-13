<?php

namespace App\Http\Controllers\api;

use App\Contracts\Services\EmployeeServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeSubmitRequest;
use App\Model\EmployeeList;
use App\Model\EmployeeSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;
use Hamcrest\Core\IsCollectionContaining;

class EmployeeApiController extends Controller
{
    private $employeeService;

    /**
     * Summary of __construct
     * @param EmployeeServiceInterface $empService
     */

    public function __construct(EmployeeServiceInterface $empService)
    {
        $this->employeeService = $empService;
    }

    /**
     * Summary of index
     * @return \Illuminate\Http\JsonResponse
     */

    public function index()
    {
        $data = $this->employeeService->fetchAllFromApi();
        return response()->json($data, 200);
    }

    /**
     * Summary of getEmployeeID
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function getEmployeeID($id)
    {
        $data = $this->employeeService->fetchItemFromApi($id);
        if (empty($data)) {
            return response()->json(['message' => 'employee not found'], 404);
        }
        return response()->json($data, 200);
    }

    /**
     * Summary of insert
     * @param EmployeeSubmitRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function insert(EmployeeSubmitRequest $request)
    {
        $validated = $request->validated();
        $this->employeeService->saveEmployee($validated);
        return response()->json(['message' => 'Successfully added'], 201);
    }

    /**
     * Summary of delete
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function delete($id)
    {
        $this->employeeService->deleteEmployeeById($id);
        return response()->json(['message' => 'Successfully deleted.'], 200);
    }

    /**
     * Summary of update
     * @param EmployeeSubmitRequest $request
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(EmployeeSubmitRequest $request, $id)
    {
        $validated = $request->validated();
        $this->employeeService->updateEmployeeById($validated, $id);
        return response()->json(['message' => 'Successfully updated.'], 200);
    }
}
