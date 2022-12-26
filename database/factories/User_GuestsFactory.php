<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User_Guests>
 */
class User_GuestsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        private static int $sequence = 1;
        private static string $guetsNames = "ゲスト";

    public function definition()
    {
        return [
            'login_id' => function() { return self::$sequence++; },
            'user_name'=> self::$guetsNames.self::$sequence,
            'last_login' => now(),
        ];
    }
}
