<?php

namespace MyMagento\Todo\Api;

use MyMagento\Todo\Api\Data\TaskInterface;

/**
 * @api
 */
interface TaskManagementInterface
{
    /**
     * @param TaskInterface $task
     * @return int
     */
    public function save(TaskInterface $task): int;

    /**
     * @param TaskInterface $task
     * @return bool
     */
    public function delete(TaskInterface $task): bool;
}