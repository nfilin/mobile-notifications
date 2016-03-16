<?php
namespace Nfilin\Libs\MobileNotifications\Device;

/**
 * Interface DeviceListInterface
 * @package Nfilin\Libs\MobileNotifications\Device
 */
interface DeviceListInterface extends \Iterator, \ArrayAccess, \Countable
{
    /**
     * @return array
     */
    public function getArrayCopy();
}