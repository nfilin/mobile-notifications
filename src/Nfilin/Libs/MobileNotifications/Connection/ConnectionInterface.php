<?php
namespace Nfilin\Libs\MobileNotifications\Connection;

use Nfilin\Libs\MobileNotifications\Authorization\AuthorizationInterface;
use Nfilin\Libs\MobileNotifications\Message\MessageInterface;
use Nfilin\Libs\MobileNotifications\Response\ResponseInterface;

/**
 * Interface ConnectionInterface
 * @package Nfilin\Libs\MobileNotifications
 */
interface ConnectionInterface
{
    /**
     * ConnectionInterface constructor.
     * @param AuthorizationInterface $auth
     * @param array|object $options
     */
    function __construct(AuthorizationInterface $auth, $options = []);

    /**
     * @return boolean
     */
    function connect();

    /**
     * @return mixed
     */
    function close();

    /**
     * @param MessageInterface $message
     * @return ResponseInterface
     */
    public function send(MessageInterface $message);

    /**
     * @param AuthorizationInterface $auth
     * @return $this
     */
    function setAuthorization(AuthorizationInterface $auth);
}