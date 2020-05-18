<?php

namespace MyMagento\Todo\Service;

use MyMagento\Todo\Api\TaskManagementInterface;
use MyMagento\Todo\Api\TaskRepositoryInterface;
use MyMagento\Todo\Api\TaskStatusManagementInterface;
use MyMagento\Todo\Model\Task;

class TaskStatusManagement implements TaskStatusManagementInterface
{
    /**
     * @var TaskRepositoryInterface
     */
    protected $repository;

    /**
     * @var TaskManagementInterface
     */
    protected $management;

    public function __construct(
        TaskRepositoryInterface $repository,
        TaskManagementInterface $management
    ) {
        $this->repository = $repository;
        $this->management = $management;
    }

    public function change(int $taskId, string $status): bool
    {
        if (!in_array($status, ['open', 'complete'])) {
            return false;
        }
        $task = $this->repository->get($taskId);
        $task->setData(Task::STATUS, $status);
        $this->management->save($task);
        return true;
    }
}