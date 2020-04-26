<?php

namespace MyMagento\Todo\Service;

use MyMagento\Todo\Api\TaskRepositoryInterface;
use MyMagento\Todo\Model\TaskFactory;
use MyMagento\Todo\Model\ResourceModel\Task as TaskResource;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var TaskResource
     */
    protected $resource;

    /**
     * @var TaskFactory
     */
    protected $taskFactory;

    public function __construct(
        TaskResource $resource,
        TaskFactory $taskFactory
    ){
        $this->resource = $resource;
        $this->taskFactory = $taskFactory;
    }

    public function get(int $taskId)
    {
        $taskObj = $this->taskFactory->create();
        return $this->resource->load($taskObj, $taskId);
    }

    public function getList()
    {
        // TODO: Implement getList() method.
    }
}