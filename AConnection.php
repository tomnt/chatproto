<?php

abstract class AConnection
{

  /**
   * @var string
   */
  protected $protocol;

  public function __construct(string $protocol){}

}