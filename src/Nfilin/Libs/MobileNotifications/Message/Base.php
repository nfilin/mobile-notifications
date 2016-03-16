<?php

namespace Nfilin\Libs\MobileNotifications\Message;

use Nfilin\Libs\BaseObject;
use Nfilin\Libs\MobileNotifications\Device\DeviceListInterface;
use Nfilin\Libs\MobileNotifications\Payload\PayloadInterface;

/**
 * Class Message
 * @package Nfilin\Libs\MobileNotifications\Message
 */
abstract class Base extends BaseObject implements MessageInterface
{
    /**
     * @var DeviceListInterface
     */
    public $receivers;
    /**
     * @var PayloadInterface
     */
    public $payload;

    public $collapse_key;
    /**
     * @var string|int
     */
    public $priority;
    /**
     * @var int
     */
    public $content_available;
    /**
     * @var bool
     */
    public $delay_while_idle;
    /**
     * @var int
     */
    public $time_to_live;
    /**
     * @var string
     */
    public $restricted_package_name;
    /**
     * @var bool
     */
    public $dry_run = false;

    /**
     * Message constructor.
     * @param DeviceListInterface $receivers
     * @param PayloadInterface|null $payload
     */
    public function __construct(DeviceListInterface $receivers, PayloadInterface $payload = null)
    {
        $this->receivers = $receivers;
        $this->payload = $payload;
    }

    /**
     * @return string
     */
    public function json()
    {
        return json_encode($this);
    }
}