<?php
namespace Nfilin\Libs\MobileNotifications\Message;

use Nfilin\Libs\MobileNotifications\Device\DeviceListInterface;
use Nfilin\Libs\MobileNotifications\Payload\PayloadInterface;

/**
 * Interface MessageInterface
 * @package Nfilin\Libs\MobileNotifications\Message
 */
interface MessageInterface extends \JsonSerializable
{
    /**
     * MessageInterface constructor.
     * @param DeviceListInterface $receivers
     * @param PayloadInterface|null $payload
     */
    public function __construct(DeviceListInterface $receivers, PayloadInterface $payload = null);

    /**
     * @return string
     */
    public function json();
}