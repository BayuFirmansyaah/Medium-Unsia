<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'status' => 'published',
            'view_count' => rand(99,9999),
            'author_id' => rand(1, 10),
            'image' => 'assets/uploads/eyJpdiI6IkozME5neS9LYnZ4UGtYbGpvVXYxMXc9PSIsInZhbHVlIjoiM0wveStKVDc3SFZVSE5GM2wwV1p2UT09IiwibWFjIjoiZDBhNjVmYmMwOWFlNzQyNjZjMTM5YTA1ODA5NzUxZjRiOGUwNmMwZWUxYjIwMzQzMWFmMjU3ODJjOWI5N2VhNyIsInRhZyI6IiJ9.png',
            'slug' => $this->faker->slug,
        ];
    }
}
