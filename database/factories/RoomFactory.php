<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word(7);
        $slug = Str::slug($name);
//        $price = $this->faker->text;
        $description = $this->faker->realText();
        $excerpt = Str::words($description,20);



        return [
            'name'=>$name,
            'slug'=>$slug,
//            'price'=>$price,
            'description'=>$description,
            'excerpt'=>$excerpt,
            'user_id'=>User::all()->random()->id,
        ];
    }
}
