<?php

namespace MyMagento\Todo\Api;

use MyMagento\Todo\Api\Data\TaskInterface;

/**
 * @api
 */
interface CustomerTaskListInterface
{
    /**
     * @return TaskInterface[]
     */
   public function getList();
}