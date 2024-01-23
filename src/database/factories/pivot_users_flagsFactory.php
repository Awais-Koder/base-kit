<?php

namespace Database\Factories;

use App\Models\pivot_users_flags;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

class pivot_users_flagsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = pivot_users_flags::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create();
        }

        return [
            'user_id' => $this->faker->word,
            'isOpenRightSidebar' => $this->faker->boolean
        ];
    }
}
