<?php
namespace Chat\connection;

use Chat\User;

interface IConnection
{
  public function getUser(string $nick): User;

}