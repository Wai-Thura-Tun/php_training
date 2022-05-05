<?php
namespace App\Http\Controllers;
use App\Contracts\Services\TaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use Illuminate\Http\Request;
class TaskController extends Controller
{
    /**
     * Summary of 
     * @var mixed
     */
    private $taskInterface;
    /**
     * Summary of __construct
     * @param TaskServiceInterface $taskServiceInterface
     */
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }
    /**
     * Show Task to view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTaskList() {
        $taskList = $this->taskInterface->getTaskAll();
        return view('index', compact('taskList'));
    }
    /**
     * Summary of createTaskList
     * @param TaskCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createTaskList(TaskCreateRequest $request) {
        $validated = $request->validated();
        $this->taskInterface->saveTask($validated);
        return back();
    }
    /**
     * Summary of editTaskList
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editTaskList($id) {
        $data = $this->taskInterface->getTaskByID($id);
        $taskList = $data['taskList'];
        $editTask = $data['task'];
        return view('index', compact('taskList', 'editTask'));
    }
    /**
     * Summary of updateTaskList
     * @param TaskUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateTaskList(TaskUpdateRequest $request) {
        $validated = $request->validated();
        $this->taskInterface->updateTaskByID($validated);
        return redirect('/');
    }

    /**
     * Summary of deleteTaskList
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteTaskList($id) {
        $this->taskInterface->deleteTaskByID($id);
        return redirect('/');
    }
}
