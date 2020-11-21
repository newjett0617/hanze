<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\Reply;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message' => $this->faker->paragraph(1),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Message $message) {
            $message->reply()->saveMany(
                Reply::factory()
                    ->count($this->faker->numberBetween(1, 5))
                    ->create([
                        'message_id' => $message['id'],
                    ])
            );
        });
    }
}
