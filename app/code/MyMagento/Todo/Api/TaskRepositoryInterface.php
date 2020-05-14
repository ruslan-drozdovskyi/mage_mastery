<?php

namespace MyMagento\Todo\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use MyMagento\Todo\Api\Data\TaskSearchResultInterface;

/**
 * @api
 */
interface TaskRepositoryInterface
{
   public function getList(SearchCriteriaInterface $searchCriteria): TaskSearchResultInterface;

   public function get(int $taskId);
}