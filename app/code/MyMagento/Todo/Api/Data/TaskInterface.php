<?php
declare(strict_types=1);

namespace MyMagento\Todo\Api\Data;

use Magento\Tests\NamingConvention\true\string;

/**
 * @api
 */
interface TaskInterface
{
    /**
     * @return int
     */
    public function getTaskId(): int;

    /**'
     * @return string
     */
    public function getStatus(): string;

    /**
     * @return string
     */
    public function getLabel(): string;
}