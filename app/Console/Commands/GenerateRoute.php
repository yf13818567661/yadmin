<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateRoute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:generateRoute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建路由';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
