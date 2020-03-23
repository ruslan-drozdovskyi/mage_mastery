<?php

namespace MyMagento\Todo\Controller;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    public function execute()
    {
        $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}