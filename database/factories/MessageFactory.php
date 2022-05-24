<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sender_id'=> $this->faker->numberBetween(3,12),
            'receiver_id'=> $this->faker->numberBetween(3,12),
            'message'=>$this->faker->paragraph(),
            'date_sent'=>$this->faker->date(),
            'reception_date'=>$this->faker->date(),
        ];
    }
}
