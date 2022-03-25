<?php

namespace Database\Seeders;

use App\Models\AstrologicalSign;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create admin account 
        $astro_sign = new AstrologicalSign();

        $birthday_date = new \DateTime("27-12-2014");

        User::create(
            $user = [
                'name' => "admin",
                'email' => 'admin@admin.com',
                'birthday_date' => $birthday_date,
                'zodiak_sign' => $astro_sign->whatsTheZodiakSign($birthday_date->format('Y-m-d')),
                'chinese_sign' => $astro_sign->whatTheChineseSign($birthday_date->format('Y-m-d')),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]);

        // create 20 accounts
        User::factory(20)->create();
    }
}
