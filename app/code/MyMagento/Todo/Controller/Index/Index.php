<?php

namespace MyMagento\Todo\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use MyMagento\Todo\Model\TaskFactory;
use MyMagento\Todo\Model\ResourceModel\Task as TaskResource;
use MyMagento\Todo\Service\TaskRepository;

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

    /**
     * @var TaskRepository
     */
    protected $taskRepository;

    public function __construct(
        Context $context,
        TaskResource $taskResource,
        TaskFactory $taskFactory,
        TaskRepository $taskRepository
    ) {
        $this->taskResource = $taskResource;
        $this->taskFactory = $taskFactory;
        $this->taskRepository = $taskRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        $task = $this->taskRepository->get(1);
        var_dump($task->getData());
//        $task = $this->taskFactory->create();
//        $task->setData([
//            'label' => 'New Task #100500',
//            'status' => 'open',
//            'customer_id' => 1,
//        ]);
//        $this->taskResource->save($task);
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}