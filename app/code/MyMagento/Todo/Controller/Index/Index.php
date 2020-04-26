<?php

namespace MyMagento\Todo\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use MyMagento\Todo\Model\TaskFactory;
use MyMagento\Todo\Model\ResourceModel\Task as TaskResource;

class Index extends Action
{
    /**
     * @var TaskFactory
     */
    protected $taskFactory;

    /**
     * @var TaskResource
     */
    protected $taskResource;

    public function __construct(
        Context $context,
        TaskResource $taskResource,
        TaskFactory $taskFactory
    ) {
        $this->taskResource = $taskResource;
        $this->taskFactory = $taskFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $task = $this->taskFactory->create();
        $task->setData([
            'label' => 'New Task #100500',
            'status' => 'open',
            'customer_id' => 1,
        ]);
        $this->taskResource->save($task);
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}