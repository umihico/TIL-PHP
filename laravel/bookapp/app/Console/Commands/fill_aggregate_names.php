<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class fill_aggregate_names extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fill_aggregate_names';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command fill_aggregate_names_description';

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
     * @return mixed
     */
    public function handle()
    {
        echo "hello world";
    }
}
