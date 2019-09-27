<?php
interface IConnection
{
  //public function getServer(): server;

  public function getUser(string $nick): User;

}