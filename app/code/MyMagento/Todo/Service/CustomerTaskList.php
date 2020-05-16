<?php
declare(strict_types=1);

namespace MyMagento\Todo\Service;

use MyMagento\Todo\Api\CustomerTaskListInterface;
use MyMagento\Todo\Api\TaskRepositoryInterface;
use MyMagento\Todo\Api\Data\TaskInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

class CustomerTaskList implements CustomerTaskListInterface
{
    /**
     * @var TaskRepositoryInterface
     */
    private $taskRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    public function __construct(
        TaskRepositoryInterface $taskRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->taskRepository = $taskRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @return TaskInterface[]
     */
    public function getList()
    {
        return $this->taskRepository
            ->getList($this->searchCriteriaBuilder->create())
            ->getItems();
    }
}