<?php

namespace App\Console\Commands;

use App\Models\BloodDoner;
use Illuminate\Console\Command;

class ReactivateBloodDoners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reactivate-blood-doners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        BloodDoner::where('status', 0)
            ->whereNotNull('donated_at')
            ->where('donated_at', '<=', now()->subDays(90))
            ->update([
                'status' => 1,
                'donated_at' => null,
            ]);

        $this->info('Reactivated eligible blood donors.');
    }

}
