<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\Argument;

class GetStudentDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'student:get-data {some_arg?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get some data index of description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $arg = $this->argument('some_arg');
        dd($arg);
        dd(111111);
    }
}
