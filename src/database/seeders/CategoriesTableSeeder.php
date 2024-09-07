<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //重複を避けるためにinsertではなく`firstOrCreate` を使用
        $categories = [
            '商品のお届けについて',
            '商品の交換について',
            '商品トラブル',
            'ショップへのお問い合わせ',
            'その他'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['content' => $category],
                ['content' => $category]
            );
        }
    }
}
