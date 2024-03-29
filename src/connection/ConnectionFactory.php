<?php
namespace Chat\connection;

class ConnectionFactory
{
  public static function getConnection(string $protocol): IConnection
  {
    if ($protocol == 'localTest') {
      return new ConnectionLocalTest($protocol);
    }elseif ($protocol == 'irc') {
      return  new ConnectionIrc($protocol);
    } elseif ($protocol == 'whatever') {
      //return  CommunicationWhatever();//TODO: Implement
    }
  }
}