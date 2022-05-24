<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->words(3,true),
            'teacher_id'=>'2',
            'init_date'=>$this->faker->dateTime(),
            'end_date'=>$this->faker->dateTime(),
            'enroll_date'=>$this->faker->dateTime(),
            'duration'=>$this->faker->numberBetween(25,80),
            'description'=>$this->faker->sentence(),
            'cost'=>$this->faker->randomFloat(2,20,30),
            'participantes'=>'0',
        ];
    }
}
