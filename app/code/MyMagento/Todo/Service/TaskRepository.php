<?php

namespace MyMagento\Todo\Service;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use MyMagento\Todo\Api\Data\TaskSearchResultInterface;
use MyMagento\Todo\Api\TaskRepositoryInterface;
use MyMagento\Todo\Model\TaskFactory;
use MyMagento\Todo\Model\ResourceModel\Task as TaskResource;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var TaskResource
     */
    protected $resource;

    /**
     * @var TaskFactory
     */
    protected $taskFactory;

    protected $collectionProcessor;

    protected $searchResultInterfaceFactory;

    public function __construct(
        TaskResource $resource,
        TaskFactory $taskFactory,
        CollectionProcessorInterface $collectionProcessor,
        TaskSearchResultInterfaceFactory $searchResultInterfaceFactory
    ){
        $this->resource = $resource;
        $this->taskFactory = $taskFactory;
        $this->searchResultInterfaceFactory = $searchResultInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function get(int $taskId)
    {
        $taskObj = $this->taskFactory->create();
        return $this->resource->load($taskObj, $taskId);
    }

    public function getList(SearchCriteriaInterface $searchCriteria): TaskSearchResultInterface
    {
        $searchResult = $this->searchResultInterfaceFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $this->collectionProcessor->process($searchCriteria, $searchResult);

        return $searchResult;
    }
}