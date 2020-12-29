<?php

namespace App\Automation\Logic;

interface Configuration
{
    /**
     * 
     */
    public function setUrl(string $url): void;

    /**
     * 
     */
    public function getUrl(): string;

    /**
     * 
     */
    public function setUsername(string $username): void;

    /**
     * 
     */
    public function getUsername(): string;

    /**
     * 
     */
    public function setPassword(string $password): void;

    /**
     * 
     */
    public function getPassword(): string;

    /**
     * 
     */
    public function setTimeExecution(int $time): void;

    /**
     * 
     */
    public function getTimeExecution(): int;

    /**
     * 
     */
    public function execute();
}
