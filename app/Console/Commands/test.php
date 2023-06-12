<?php

namespace App\Console\Commands;

use App\Models\Setting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        // print_r(uniqid(25));

        // echo $status['identity'];
        // echo $s->status;
        $satpamLiaa = DB::table('settings')->where('identity', 'register')->value('status');
        // if($satpamLiaa->status == 'enable') {
        //     print_r("ENABLE");
        // } else {
        //     print_r("DISABLE");
        // }
        echo $satpamLiaa;
    }
}
