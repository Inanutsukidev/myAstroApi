<?php

namespace Database\Factories;

use App\Models\AstrologicalSign;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'birthday_date' => $this->faker->date(),
            'zodiak_sign' => "",
            'chinese_sign' => "",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        $astro_sign = new AstrologicalSign();

        $zodiak_sign = $astro_sign->whatsTheZodiakSign($user['birthday_date']);
        $chinese_sign = $astro_sign->whatTheChineseSign($user['birthday_date']);

        $user['zodiak_sign'] = $zodiak_sign;
        $user['chinese_sign'] = $chinese_sign;
        
        return $user;
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
