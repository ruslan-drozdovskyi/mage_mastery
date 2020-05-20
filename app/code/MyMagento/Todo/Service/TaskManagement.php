<?php

namespace MyMagento\Todo\Service;

use MyMagento\Todo\Api\TaskManagementInterface;
use MyMagento\Todo\Api\Data\TaskInterface;
use MyMagento\Todo\Model\ResourceModel\Task;
use Magento\Framework\Exception\AlreadyExistsException;

class TaskManagement implements TaskManagementInterface
{
    /**
     * @var Task
     */
    private $resource;

    /**
     * TaskManagement constructor.
     * @param Task $resource
     */
    public function __construct(Task $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @param TaskInterface $task
     * @return bool
     * @throws AlreadyExistsException
     */
    public function save(TaskInterface $task): bool
    {
        $this->resource->save($task);
        return true;
    }

    /**
     * @param TaskInterface $task
     * @return bool
     * @throws \Exception
     */
    public function delete(TaskInterface $task): bool
    {
        $this->resource->delete($task);
        return true;
    }
}