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
        BloodDoner::where('status', 0)
            ->whereNotNull('donated_at')
            ->where('donated_at', '<=', now()->subDays(90))
            ->update([
                'status' => 1,
                'donated_at' => null,
            ]
        );
    }
}
