<?php
namespace Chat\connection;

use Chat\{Server,User};

class ConnectionIrc extends AConnection implements IConnection
{
  public function getUser(string $nick): User
  {
    // TODO: Implement send() method.
    return new User(0,'fakeNick',new Server()); //TODO: Implement; This is just a mock.
  }

}