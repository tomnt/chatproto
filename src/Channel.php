<?php

namespace Chat;

class Channel
{
  ////////////////////////////////////////////////////////////////////////////////////////////////////
  /// Properties
  ////////////////////////////////////////////////////////////////////////////////////////////////////
  /**
   * @var Server
   */
  private $server;

  /**
   * @var int $id
   */
  public $id;
  /**
   * @var string $channelName
   */
  private $channelName;
  /**
   * @var User[] $aUser
   */
  public $aUser = [];

  /**
   * @var Message[] $aMessage
   */
  private $aMessage = [];


  /**
   * Channel constructor.
   * @param int $id
   * @param string $channelName
   * @param Server $server
   */
  public function __construct(int $id, string $channelName, Server &$server)
  {
    $this->id = $id;
    $this->channelName = $channelName;
    $this->server = &$server;
  }

  /**
   * @return int
   */
  public function getId(): int{
    return $this->id;
  }

  /**
   * @return string
   */
  public function getChannelName(): string{
    return $this->channelName;
  }

  /**
   * @param string $nick
   * @throws Exception
   */
  public function addUser(string $nick): void
  {
    $user = $this->server->getUser($nick);
    $user->setChannel($this);
    $this->aUser[$user->getId()] = &$user;
  }

  /**
   * @return User[]
   */
  public function getUsers(): array
  {
    return $this->aUser;
  }

  /**
   * @param Message $message
   */
  public function setMessage(Message $message){
    $this->aMessage[$message->getId()]=$message;
  }

  /**
   * @return Message[]
   */
  public function getMessages(): array{
    return $this->aMessage;
  }
}