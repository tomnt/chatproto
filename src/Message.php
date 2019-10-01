<?php

namespace Chat;

class Message
{
  /**
   * @var int $id
   */
  private $id;

  /**
   * @var DateTime
   */
  private $dateTime;

  /**
   * @var User $user Sender
   */
  private $user;

  /**
   * @var Channel $channel
   */
  private $channel;

  /**
   * @var string $body
   */
  private $body;

  /**
   * Message constructor.
   * @param int $id
   * @param User $user
   * @param Channel $channel
   * @param string $body
   * @throws \Exception
   */
  function __construct(int $id, User &$user, Channel &$channel, string $body)
  {
    $this->id = $id;
    $this->dateTime = new \DateTime();
    $this->body = $body;
    $this->user = &$user;
    $this->channel = &$channel;
    $this->user->setMessage($this);
    $this->channel->setMessage($this);
  }

  /**
   * @return int
   */
  public function getId(): int{
    return $this->id;
  }

  /**
   * @return DateTime
   */
  public function getDateTime(): DateTime{
    return $this->dateTime;
  }

  /**
   * @return User
   */
  public function getUser(): User{
    return $this->user;
  }

  /**
   * @return Channel
   */
  public function getChannel(): Channel{
    return $this->channel;
  }

  /**
   * @return string
   */
  public function getBody(): string{
    return $this->body;
  }

  /**
   * @return string
   */
  function __toString(): string
  {
    return $this->id. ' : ' .$this->dateTime->format(DATE_ISO8601)." : ".$this->user->getNick()." : ".$this->channel->getChannelName()." : ".$this->body;
  }

}