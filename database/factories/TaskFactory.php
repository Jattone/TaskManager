<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name'           => fake()->words(4, true),
            'description'    => fake()->sentences(4, true),
            'status'         => fake()->randomElement(Task::STATUSES),
            'assignee'       => function(){
                $user = User::inRandomOrder()->first();
                return $user ? $user->id : User::factory()->count(1)->create()->id;
            },
        ];
    }
}
