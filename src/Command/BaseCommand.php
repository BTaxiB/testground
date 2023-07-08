<?php

namespace App\Command;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

abstract class BaseCommand extends Command
{
    public const DEFAULT_TIMEOUT = 5;

    protected $timeout;
    protected $lastUsage;
    protected $lastPeakUsage;

    /**
     * @see Command::__construct()
     */
    public function __construct(string $name = null)
    {
        // Construct our context
        $this->shutdownRequested = false;
        $this->setTimeout(static::DEFAULT_TIMEOUT);
        $this->returnCode = 0;
        $this->lastUsage = 0;
        $this->lastPeakUsage = 0;

        // Construct parent context (also calls configure)
        parent::__construct($name);

        // Merge our options
        $this->addOption('run-once', null, InputOption::VALUE_NONE,
            'Run the command just once, do not go into an endless loop');
        $this->addOption('detect-leaks', null, InputOption::VALUE_NONE, 'Output information about memory usage');

        // Set our runloop as the executable code
        parent::setCode([$this, 'runloop']);
    }

    /**
     * @see Command::run()
     */
    public function run(InputInterface $input, OutputInterface $output): int
    {
        return parent::run($input, $output);
    }

    /**
     * Called before first execute
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function starting(InputInterface $input, OutputInterface $output): void
    {
    }

    /**
     * Get information about the current memory usage
     *
     * @param bool True for peak usage, false for current usage
     *
     * @return array
     */
    private function getMemoryInfo(bool $peak = false): array
    {
        $lastUsage = ($peak) ? $this->lastPeakUsage : $this->lastUsage;
        $info['amount'] = ($peak) ? memory_get_peak_usage() : memory_get_usage();
        $info['diff'] = $info['amount'] - $lastUsage;
        $info['diffPercentage'] = ($lastUsage == 0) ? 0 : $info['diff'] / ($lastUsage / 100);
        $info['statusDescription'] = 'stable';
        $info['statusType'] = 'info';

        if ($info['diff'] > 0) {
            $info['statusDescription'] = 'increasing';
            $info['statusType'] = 'error';
        } else {
            if ($info['diff'] < 0) {
                $info['statusDescription'] = 'decreasing';
                $info['statusType'] = 'comment';
            }
        }

        // Update last usage variables
        if ($peak) {
            $this->lastPeakUsage = $info['amount'];
        } else {
            $this->lastUsage = $info['amount'];
        }

        return $info;
    }

    /**
     * Set the timeout of this command.
     *
     * @param int|float $timeout Timeout between two iterations in seconds
     *
     * @return Command The current instance
     *
     * @throws \InvalidArgumentException
     */
    public function setTimeout(float $timeout)
    {
        if ($timeout < 0) {
            throw new \InvalidArgumentException('Invalid timeout provided to Command::setTimeout.');
        }

        $this->timeout = (int) (1000000 * $timeout);

        return $this;
    }

    /**
     * Get the timeout of this command.
     *
     * @return float Timeout between two iterations in seconds
     */
    public function getTimeout(): float
    {
        return ($this->timeout / 1000000);
    }

    /**
     * Called on shutdown after the last iteration finished.
     *
     * Use this to do some cleanup, but keep it fast. If you take too long and we must
     * exit because of a signal changes are the process will be killed! It's the counterpart
     * of initialize().
     *
     * @param InputInterface $input An InputInterface instance
     * @param OutputInterface $output An OutputInterface instance, will be a NullOutput if the verbose is not set
     */
    protected function finalize(InputInterface $input, OutputInterface $output): void
    {
    }
}
