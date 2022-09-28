<?php

namespace Uuu9\Health;

use Illuminate\Console\Command;

class CheckCommand extends Command
{

    protected $signature = 'health_check';

    protected $description = '健康检查';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(Check $check)
    {
        try {
            $check->run();
            exit(0);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit(1);
        }
    }
}
