<?php

namespace App\Services;

use App\Contracts\Dao\TaskDaoInterface;
use App\Contracts\Services\TaskServiceInterface;
use Illuminate\Http\Request;

class TaskService implements TaskServiceInterface
{
    /**
     * Summary of 
     * @var mixed
     */
    private $taskDao;
    /**
     * Summary of __construct
     * @param TaskDaoInterface $taskDaoInterface
     */
    public function __construct(TaskDaoInterface $taskDaoInterface)
    {
        $this->taskDao = $taskDaoInterface;
    }
    /**
     * Save tasks from input to database
     * @param mixed $validated
     * @return mixed
     */
    public function saveTask($validated)
    {
        return $this->taskDao->saveTask($validated);
    }
    /**
     * fetch all from database
     * @return mixed
     */
    public function getTaskAll()
    {
        return $this->taskDao->getTaskAll();
    }
    /**
     * fetch from table using id
     * @param mixed $id
     * @return mixed
     */
    public function getTaskByID($id)
    {
        return $this->taskDao->getTaskByID($id);
    }
    /**
     * save update data to databae
     * @param mixed $validated
     * @return mixed
     */
    public function updateTaskByID($validated)
    {
        return $this->taskDao->updateTaskByID($validated);
    }
    /**
     * delete exact task
     * @param mixed $id
     * @return mixed
     */
    public function deleteTaskByID($id)
    {
        return $this->taskDao->deleteTaskByID($id);
    }
}
