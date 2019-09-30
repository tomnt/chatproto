<?php
include_once 'AConnection.php';
include_once 'IConnection.php';
include_once 'Server.php';

class ConnectionLocalTest extends AConnection implements IConnection
{
  /**
   * @var Server $server
   */
  private $server;

  /**
   * ConnectionLocalTest constructor.
   * @param string $protocol
   */
  function __construct(string $protocol)
  {
    parent::__construct($protocol);
    $this->server = new Server();
    $this->protocol='LocalTest';
  }

  public function getUser(string $nick): User
  {
    return $this->server->getUser($nick);
  }

}