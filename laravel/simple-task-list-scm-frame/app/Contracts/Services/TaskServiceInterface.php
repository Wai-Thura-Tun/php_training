<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface TaskServiceInterface
{
    /**
     * Summary of saveTask
     * @param mixed $validated
     * @return void
     */
    public function saveTask($validated);
    /**
     * Summary of getTaskAll
     * @return void
     */
    public function getTaskAll();
    /**
     * Summary of getTaskByID
     * @param mixed $id
     * @return void
     */
    public function getTaskByID($id);
    /**
     * Summary of updateTaskByID
     * @param mixed $validated
     * @return void
     */
    public function updateTaskByID($validated,$id);
    /**
     * Summary of deleteTaskByID
     * @param mixed $id
     * @return void
     */
    public function deleteTaskByID($id);
}
