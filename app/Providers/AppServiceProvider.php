<?php

namespace App\Providers;

use App\Models\BloodDoner;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!\Cache::has('reactivate_blood_donors_ran_today')) {
            \Log::info('Reactivate ran at ' . now());

            BloodDoner::where('status', 0)
                ->whereNotNull('donated_at')
                ->where('donated_at', '<=', now()->subDays(90))
                ->update(
                    [
                        'status' => 1,
                        'donated_at' => null,
                    ]
                );

            \Cache::put('reactivate_blood_donors_ran_today', true, now()->endOfDay());

            // \Log::info('Reactivated eligible blood donors.');
        }
    }
}
