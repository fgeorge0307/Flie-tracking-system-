<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\User;
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
            'to' => $this->faker->to(),
            'from' => $this->faker->from(),
            'subject' => $this->faker->text(50),
            'filepath' => $this->faker->filepath(),
            'broadcast' => $this->faker->broadcast(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
