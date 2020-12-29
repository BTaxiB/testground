<?php

namespace App\Automation\Logic;

use App\Automation\Logic\Configuration;
use App\Automation\Driver;

abstract class Automatic extends Driver implements Configuration
{
  protected $driver;

  protected string $url;

  protected string $keyword;

  protected string $username;

  protected string $password;

  protected int $execTime;


  public function __construct()
  {
    parent::__construct();
  }

  public function setUrl(string $url): void
  {
    $this->url = $url;
  }

  public function getUrl(): string
  {
    return $this->url;
  }

  public function setKeyword(string $keyword): void
  {
    $this->keyword = $keyword;
  }

  public function getKeyword(): string
  {
    return $this->keyword;
  }

  public function setUsername(string $username): void
  {
    $this->username = $username;
  }

  public function getUsername(): string
  {
    return $this->username;
  }

  public function setPassword(string $password): void
  {
    $this->password = $password;
  }

  public function getPassword(): string
  {
    return $this->password;
  }


  public function setTimeExecution(int $time): void
  {
    $this->execTime = $time;
  }

  public function getTimeExecution(): int
  {
    return $this->execTime;
  }

  abstract public function execute();
}
