<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stream>
 */
class StreamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name;

        return [
            'name' => $name . '\'s awesome stream',
            'description' => $this->faker->text(150),
            'img_preview' => $this->faker->imageUrl(randomize: false, word: 'Stream preview for ' . $name, gray: true),
            'created_by' => User::factory()->create(),
            'created_at' => $this->faker->dateTime()
        ];
    }
}
