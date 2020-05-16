<?php

namespace MyMagento\Todo\Api;

use MyMagento\Todo\Api\Data\TaskInterface;

/**
 * @api
 */
interface TaskManagementInterface
{
    public function save(TaskInterface $task);

    public function delete(TaskInterface $task);
}