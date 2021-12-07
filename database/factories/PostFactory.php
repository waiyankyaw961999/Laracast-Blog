<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>$this->faker->numberBetween($min=1,$max=20),
            'category_id'=> $this->faker->numberBetween($min=1,$max=5),
            'slug'=>$this->faker->slug(),
            'title'=>$this->faker->sentence(),
            'excerpt'=>'<p>'.implode('</p><p>',$this->faker->paragraphs(2)).'</p>',
            'body'=>'<p>'.implode('</p><p>',$this->faker->paragraphs(6)).'</p>',
        ];
    }
}
