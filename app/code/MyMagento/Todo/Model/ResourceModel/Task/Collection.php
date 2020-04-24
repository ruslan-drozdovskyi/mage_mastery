<?php

namespace MyMagento\Todo\Model\ResourceModel\Task;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MyMagento\Todo\Model\ResourceModel\Task as TaskResource;
use MyMagento\Todo\Model\Task as TaskModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(TaskModel::class, TaskResource::class);
    }
}