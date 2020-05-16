<?php

namespace MyMagento\Todo\Service;

use MyMagento\Todo\Api\TaskManagementInterface;
use MyMagento\Todo\Api\Data\TaskInterface;
use MyMagento\Todo\Model\ResourceModel\Task;

class TaskManagement implements TaskManagementInterface
{
    private $resource;

    public function __construct(Task $resource)
    {
        $this->resource = $resource;
    }

    public function save(TaskInterface $task)
    {
        $this->resource->save($task);
    }

    public function delete(TaskInterface $task)
    {
        $this->resource->delete($task);
    }
}