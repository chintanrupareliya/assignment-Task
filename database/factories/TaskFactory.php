<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\User;

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
            //
            'title'=>$this->faker->sentence,
            'description'=>$this->faker->paragraph,
            'due_date'=>$this->faker->dateTimeBetween('now','+30 day')->format('Y-m-d'),
            'user_id'=>function(){
                // ...

                return User::factory()->create()->id; // Fix the class name
            }
        ];
    }
}
