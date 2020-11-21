<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->userName,
            'password' => 'password',
            'token' => Str::random(10),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'mobile' => '0912' . rand(100000, 999999),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $user->messages()->saveMany(
                Message::factory()
                    ->count($this->faker->numberBetween(1, 5))
                    ->create([
                        'user_id' => $user['id'],
                    ])
            );
        });
    }
}
