<?php

namespace App\Dao;

use App\Task;
use App\Contracts\Dao\TaskDaoInterface;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;

class TaskDao implements TaskDaoInterface
{
    /**
     * Save tasks from input to database
     * @param Request $request
     * @return Task
     */
    public function saveTask($validated)
    {
        $task = new Task();
        $task->title = $validated['title'];
        $task->detail = $validated['detail'];
        $task->save();
        return $task;
    }

    /**
     * fetch all from database
     * @return \Illuminate\Database\Eloquent\Collection|array<\Illuminate\Database\Eloquent\Model>
     */
    public function getTaskAll()
    {
        $task = Task::all();
        return $task;
    }
    /**
     * fetch from table using id
     * @param mixed $id
     * @return array
     */
    public function getTaskByID($id)
    {
        $task = Task::find($id);
        $taskAll = Task::all();
        $data = ['task' => $task, 'taskList' => $taskAll];
        return $data;
    }
    /**
     * save update data to databae
     * @param Request $request
     * @return mixed
     */
    public function updateTaskByID($validated)
    {
        $currentTask = Task::find($validated['uid']);
        $currentTask->title = $validated['utitle'];
        $currentTask->detail = $validated['udetail'];
        $currentTask->updated_at = now();
        $currentTask->save();
        return $currentTask;
    }
    /**
     * delete exact task
     * @param mixed $id
     * @return mixed
     */
    public function deleteTaskByID($id)
    {
        $task = Task::find($id);
        $task->delete();
        return $task;
    }
}
