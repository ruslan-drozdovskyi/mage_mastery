<?php

namespace MyMagento\Todo\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Task extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('mymagento_todo_task', 'task_id');
    }
}