<?php

namespace App\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestBotCommand extends BaseCommand
{
    protected static $defaultName = "test:bot";
    public function configure()
    {
        $this->setDescription("Test bot command")->setHelp("Just show off.");
        parent::configure();
    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        echo "eeee najjaci sam" . PHP_EOL;
    }
}
