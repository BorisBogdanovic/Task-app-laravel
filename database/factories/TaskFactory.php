<?php

namespace Database\Factories;

use App\Models\Priority;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'responsible_person' => User::inRandomOrder()->whereNot('is_admin',1)->first()->id,
            'deadline' => fake()->date(),
            'description'=>fake()->text(),
            'status_id' => Status::inRandomOrder()->first()->id,
            'priority_id' =>Priority::inRandomOrder()->first()->id,
            'created_at' => now()
        ];
    }
}
