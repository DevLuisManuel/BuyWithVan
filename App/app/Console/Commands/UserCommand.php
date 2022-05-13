<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UserCommand extends Command
{
    protected $signature = 'command:name';

    protected $description = 'Command description';

    public function handle()
    {
        return 0;
    }

    private function getAllUser(){

    }

}
