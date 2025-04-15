<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::create(
            [
                'organization_name' => 'মানবতার হাসি ফাউন্ডেশন',
                'slogan' => 'আপনার আমার একটু প্রচেষ্টা হাসি ফুটাবে অসহায় মানুষদের মুখে ইনশাআল্লাহ!',
                'description' => 'মানবতার হাসি ফাউন্ডেশন একটি অলাভজনক সংস্থা যা সমাজের সুবিধাবঞ্চিত মানুষের জন্য কাজ করে।',
                'location' => 'বালি মসজিদ বাজার, দূর্গাপুর, বেগমগঞ্জ, নোয়াখালী।',
                'other_info' => 'আমরা বিভিন্ন সামাজিক কার্যক্রম পরিচালনা করি যেমন শিক্ষা, স্বাস্থ্যসেবা এবং দারিদ্র্য বিমোচন।',
            ]
        );
    }
}
