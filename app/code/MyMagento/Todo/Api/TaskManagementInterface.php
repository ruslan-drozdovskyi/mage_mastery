<?php

namespace MyMagento\Todo\Api;

/**
 * @api
 */
interface TaskManagementInterface
{
    public function save();

    public function delete();
}