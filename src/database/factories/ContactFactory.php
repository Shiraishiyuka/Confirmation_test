<?php

namespace Database\Factories;

use App\Models\Contact;
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
            'gender' => $this->faker->randomElement(['男性','女性','その他']),
            'email' => $this->faker->safeEmail,
            'tell1' => $this->faker->phoneNumber,
            'tell2' => $this->faker->phoneNumber,
            'tell3' => $this->faker->phoneNumber,
            'address' => $this->faker->city,
            'building' => $this->faker->secondaryAddress,
            'inquiry' => $this->faker->randomElement(['商品のお届けについて','商品の交換について','商品トラブル','ショップへのお問い合わせ','その他']),
            'content' => $this->faker->randomElement(['届いた商品が注文した商品でありませんでした']),
        ];
    
    }
}


