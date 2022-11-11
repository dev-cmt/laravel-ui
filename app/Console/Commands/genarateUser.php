<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class genarateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate some users on users table';

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
        $user=$this->argument('count');
        for ($i=0; $i<$user; $i++){
            User::factory()->create();
        }
        // return 0;
    }
}
