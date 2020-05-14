<?php

namespace MyMagento\Todo\Service;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use MyMagento\Todo\Api\Data\TaskSearchResultInterfaceFactory;
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

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var TaskSearchResultInterfaceFactory
     */
    protected $searchResultFactory;

    public function __construct(
        TaskResource $resource,
        TaskFactory $taskFactory,
        CollectionProcessorInterface $collectionProcessor,
        TaskSearchResultInterfaceFactory $searchResultFactory
    ){
        $this->resource = $resource;
        $this->taskFactory = $taskFactory;
        $this->searchResultFactory = $searchResultFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function get(int $taskId)
    {
        $taskObj = $this->taskFactory->create();
        return $this->resource->load($taskObj, $taskId);
    }

    public function getList(SearchCriteriaInterface $searchCriteria): TaskSearchResultInterface
    {
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $this->collectionProcessor->process($searchCriteria, $searchResult);

        return $searchResult;
    }
}