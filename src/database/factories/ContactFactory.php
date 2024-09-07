<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */

        // ロケールを日本語に設定
        
    public function definition()
    {
        // ロケールを日本語に設定
        $this->faker = \Faker\Factory::create('ja_JP');

        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->randomElement(['男性','女性','その他']),
            'email' => $this->faker->safeEmail,
            'tell' => $this->faker->phoneNumber,
            'address' => $this->faker->city,
            'building' => $this->faker->secondaryAddress,
            'category_id' => Category::inRandomOrder()->first()->id,
            'content' => $this->faker->randomElement(['届いた商品が注文した商品でありませんでした']),
        ];
    
    }
}


