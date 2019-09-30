<?php

include_once 'User.php';
include_once 'Server.php';
include_once 'ConnectionFactory.php';

class Main
{
  function __construct()
  {
    $connection = ConnectionFactory::getConnection('localTest');
    $u1 = $connection->getUser('Zhe');
    $c1 = $u1->join('C1');
    $u1->publishMessage('C1', 'Good morning, C one.');
    $u1->publishMessage('C2', 'Hello C two');
    $u2 = $connection->getUser('Tom');
    $u2->publishMessage('C1', 'Buenos días, C uno.');
    // Report
    echo $u1->getNick() . ' said;' . PHP_EOL;
    self::printMessages($u1->getMessages());
    echo "Messages on " . $c1->getChannelName() . PHP_EOL;
    self::printMessages($c1->getMessages());
    echo 'Channels ' . $u1->getNick() . ' is in;' . PHP_EOL;
    foreach ($u1->getChannels() as $c) {
      echo '  ' . $c->getChannelName() . PHP_EOL;
    }
    echo 'Members in channel, ' . $c1->getChannelName() . PHP_EOL;
    foreach ($c1->getUsers() as $user) {
      echo '  ' . $user->getNick() . PHP_EOL;
    }
  }

  /**
   * @param Message[] $aMessages
   */
  private static function printMessages(array $aMessages): void
  {
    foreach ($aMessages as $message)
      echo "  " . $message . PHP_EOL;
  }

}

new Main();

