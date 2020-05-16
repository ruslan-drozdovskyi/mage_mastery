<?php

namespace MyMagento\Todo\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use MyMagento\Todo\Api\TaskManagementInterface;
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

    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    protected $taskManagement;

    public function __construct(
        Context $context,
        TaskResource $taskResource,
        TaskFactory $taskFactory,
        TaskRepository $taskRepository,
        TaskManagementInterface $taskManagement,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->taskResource = $taskResource;
        $this->taskFactory = $taskFactory;
        $this->taskRepository = $taskRepository;
        $this->taskManagement = $taskManagement;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context);
    }

    public function execute()
    {
        $task = $this->taskRepository->get(1);
        $task->setData('status','complete');
        $this->taskManagement->save($task);

        $searchCriteria = $this->searchCriteriaBuilder->create();
        var_dump($this->taskRepository->getList($searchCriteria)->getItems());
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