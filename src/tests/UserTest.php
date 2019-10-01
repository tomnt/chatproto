<?php

use PHPUnit\Framework\TestCase;
use Chat\{Server, User, Message, Channel};

class UserTest extends TestCase
{
  /**
   * @var User $user
   */
  private $user;

  /**
   * @var Server $server
   */
  private $server;

  function __construct($name = null, array $data = [], $dataName = '')
  {
    parent::__construct($name, $data, $dataName);
    $this->server = new Server();
    $this->user = new User(123, 'TestNick', $this->server);
    $this->user->getId();
  }

  public function testGetNick()
  {
    $this->assertEquals('TestNick', $this->user->getNick());
  }

  public function testGetId()
  {
    $this->assertEquals(123, $this->user->getId());
  }

  public function testGetMessages()
  {
    $channel = new Channel(1, 'TestChannel', $this->server);
    for ($id = 1; $id <= 3; $id++) {
      $this->user->setMessage(new Message($id, $this->user, $channel, 'Test Body ' . $id));
    }
    foreach ($this->user->getMessages() as $message) {
      $id = $message->getId();
      $this->assertEquals('TestNick', $message->getUser()->getNick());
      $this->assertEquals('TestChannel', $message->getChannel()->getChannelName());
      $this->assertEquals('Test Body ' . $id, $message->getBody());
    }
  }

  public function testGetChannels()
  {
    $countOfChannels = 3;
    for ($id = 1; $id <= $countOfChannels; $id++) {
      $this->server->getChannel('TestChannel ' . $id);
      $this->user->join('TestChannel ' . $id);
    }
    $aChannel= $this->user->getChannels();
    $this->assertEquals($countOfChannels, count($aChannel));
    foreach($aChannel as $channel){
        $this->assertEquals(true,  (false !== strpos($channel->getChannelName(), 'TestChannel ')));
    }
  }
}