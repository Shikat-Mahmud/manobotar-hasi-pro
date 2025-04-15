<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create(
            [
                'name' => 'মানবতার হাসি ফাউন্ডেশন',
                'message' => 'আপনার আমার একটু প্রচেষ্টা হাসি ফুটাবে অসহায় মানুষদের মুখে ইনশাআল্লাহ!',
                'status' => 0
            ]
        );
    }
}
