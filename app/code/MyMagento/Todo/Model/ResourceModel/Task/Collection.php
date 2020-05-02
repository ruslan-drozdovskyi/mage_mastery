<?php

namespace MyMagento\Todo\Model\ResourceModel\Task;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Framework\Api\SearchCriteriaInterface;
use MyMagento\Todo\Model\ResourceModel\Task as TaskResource;
use MyMagento\Todo\Model\Task as TaskModel;
use MyMagento\Todo\Api\Data\TaskSearchResultInterface;

class Collection extends AbstractCollection implements TaskSearchResultInterface
{
    /**
     * @var SearchCriteriaInterface
     */
    protected $searchCriteria;

    protected function _construct()
    {
        $this->_init(TaskModel::class, TaskResource::class);
    }

    public function setItems(array $items = null)
    {
       if (!$items) {
           return $this;
       }
       foreach ($items as $item) {
           $this->addItem($item);
       }
       return $this;
    }

    public function setSearchCriteria(SearchCriteriaInterface $searchCriteria = null)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }

    public function getSearchCriteria()
    {
       return $this->searchCriteria;
    }

    public function getTotalCount()
    {
        return $this->getSize();
    }

    public function setTotalCount($totalCount)
    {
        return $this;
    }

}