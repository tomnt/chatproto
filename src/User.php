<?php

namespace Chat;

class User
{
  ////////////////////////////////////////////////////////////////////////////////////////////////////
  /// Properties
  ////////////////////////////////////////////////////////////////////////////////////////////////////

  /**
   * @var int $id
   */
  private $id;

  /**
   * @var string $nick
   */
  private $nick;

  /**
   * @var bool $active
   */
  private $active = false;

  /**
   * @var Channel[] $aChannel
   */
  private $aChannel = [];

  /**
   * @var Message[] $aMessage
   */
  private $aMessage = [];

  /**
   * @var Server
   */
  private $server;

  /**
   * User constructor.
   * @param int $id
   * @param string $nick
   * @param Server $server
   */
  public function __construct(int $id, string $nick, Server & $server)
  {
    $this->id = $id;
    $this->nick = $nick;
    $this->active = true;
    $this->server = &$server;
  }

  /**
   * @param Message $message
   */
  public function setMessage(Message $message){
    $this->aMessage[$message->getId()]=$message;
  }

  /**
   * @return string
   */
  public function getId(): string{
    return $this->id;
  }

  /**
   * @return string
   */
  public function getNick(): string{
    return $this->nick;
  }

  /**
   * @param string $channelName
   * @return Channel
   * @throws Exception
   */
  public function join(string $channelName): Channel
  {
    $channel = $this->server->getChannel($channelName);
    $channel->addUser($this->nick);
    $this->aChannel[$channel->getId()] = &$channel;
    return $channel;
  }

  /**
   * @param string $channelName
   * @param string $body
   * @throws \Exception
   */
  public function publishMessage(string $channelName, string $body): void
  {
    $channel=$this->server->getChannel($channelName);
    $this->join($channelName);

    $message=$this->server->createMessage($this,$channel,$body);
    $this->setMessage($message);
  }

  /**
   * @return Message[]
   */
  public function getMessages(): array{
    return $this->aMessage;
  }

  /**
   * @return Channel[]
   */
  public function getChannels(): array{
    return $this->aChannel;
  }

  /**
   * @param Channel $channel
   */
  public function setChannel(Channel &$channel): void{
    $this->aChannel[$channel->id] = $channel;
  }

}