<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'category_id' => rand(1, 5), // ランダムなカテゴリID（1〜5）
            'first_name' => $this->faker->firstName, // ランダムな名前
            'last_name' => $this->faker->lastName, // ランダムな苗字
            'gender' => rand(1, 3), // 性別 (1: 男性, 2: 女性, 3: その他)
            'email' => $this->faker->unique()->safeEmail, // ランダムなメールアドレス
            'phone' => $this->faker->phoneNumber, // ランダムな電話番号
            'address' => $this->faker->address, // ランダムな住所
            'building' => $this->faker->secondaryAddress, // ランダムな建物名（nullable対応）
            'content' => $this->faker->realText(200), // ランダムな詳細内容
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
