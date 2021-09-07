<?php

namespace App;

interface CommandInterface
{
    /**
     * @return void
     */
    public function execute();
}