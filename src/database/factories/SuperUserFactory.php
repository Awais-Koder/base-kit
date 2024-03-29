<?php

namespace Database\Factories;

use App\Models\SuperUser;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

class SuperUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SuperUser::class;

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
            'user_id' => $this->faker->word
        ];
    }
}
