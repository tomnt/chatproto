<?php

namespace Chat;

//include_once 'Channel.php';

class Server
{
  ////////////////////////////////////////////////////////////////////////////////////////////////////
  /// Properties
  ////////////////////////////////////////////////////////////////////////////////////////////////////
  /**
   * @var Channel[] $aChannel Channel rooms
   */
  private $aChannel = [];
  /**
   * @var User[] $aUser
   */
  private $aUser = [];

  /**
   * @var Message[] $aMessage
   */
  private $aMessage = [];

  ////////////////////////////////////////////////////////////////////////////////////////////////////
  // Channel
  ////////////////////////////////////////////////////////////////////////////////////////////////////
  /**
   * Create Channel object and set
   * @param string $channelName
   * @return Channel
   * @throws Exception
   */
  private function createChannel(string $channelName): Channel
  {
    $id = count($this->aChannel);
    foreach ($this->aChannel as $channel) {
      if ($channelName == $channel->getChannelName()) {
        throw new Exception("Can't add. Room name,'$channelName' exists.");
      }
    }
    $this->aChannel[$id] = new Channel($id, $channelName, $this);
    return $this->aChannel[$id];
  }

  /**
   * Obtain Channel object.
   *
   * @param string $channelName Channel name
   * @return Channel Channel object
   * @throws Exception
   */
  public function getChannel(string $channelName): Channel
  {
    foreach ($this->aChannel as $channel) {
      if ($channelName == $channel->getChannelName()) {
        return $channel;
      }
    }
    return $this->createChannel($channelName);
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////
  /// User
  ////////////////////////////////////////////////////////////////////////////////////////////////////

  /**
   * Obtain User object
   *
   * @param string $nick Nick name of the user
   * @return User User object
   * @throws Exception
   */
  private function createUser(string $nick): User
  {
    $id = count($this->aUser);
    foreach ($this->aUser as $user) {
      if ($nick == $user->getNick()) {
        throw new Exception("Can't add. User name,'$nick' exists.");
      }
    }
    $this->aUser[$id] = new User($id, $nick, $this);
    return $this->aUser[$id];
  }

  /**
   * @param string $nick
   * @return User
   * @throws Exception
   */
  public function getUser(string $nick): User
  {
    foreach ($this->aUser as $user) {
      if ($nick == $user->getNick()) {
        return $user;
      }
    }
    return $this->createUser($nick);
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////
  /// Message
  ////////////////////////////////////////////////////////////////////////////////////////////////////
  /**
   * Obtain Message object
   *
   * @param User $user User object
   * @param Channel $channel Channel object
   * @param string $body Body of the message
   * @return Message Message object
   * @throws Exception
   */
  public function createMessage(User $user, Channel $channel, string $body): Message
  {
    $id = count($this->aMessage);
    foreach ($this->aMessage as $message) {
      if ($body == $message->getBody()) {
        throw new Exception("Can't add. Message name,'message' exists.");
      }
    }
    $this->aMessage[$id] = new Message($id, $user,$channel, $body);
    return $this->aMessage[$id];
  }

  /**
   * Obtain an array of all Messages object
   *
   * @return Message[] Array of all Messages object
   * @throws Exception
   */
  public function getMessages(): array
  {
    return $this->aMessage;
  }

}