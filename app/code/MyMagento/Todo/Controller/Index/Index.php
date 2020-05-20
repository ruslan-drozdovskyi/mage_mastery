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
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}