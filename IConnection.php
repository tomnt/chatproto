<?php
interface IConnection
{
  //public function getServer(): server;

  public function getChannel(string $channelName): Channel;

  public function getUser(string $nick): User;

  public function createMessage(User $user, Channel $channel, string $body): Message;

  public function getMessages(): array;

}