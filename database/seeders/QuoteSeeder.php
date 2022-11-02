<?php

namespace Database\Seeders;

use App\Models\Quote;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Количество создаваемых демо записей
     * @var int
     */
    private $count_quote = 20;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        for ($i = 1; $i <= $this->count_quote; $i++){
            $faker = Factory::create();

            Quote::create([
                'editor_id'  => $user->id,
                'quote' => $faker->sentence,
                'author' => $faker->name,
            ]);
        }
        echo "Создали [$this->count_quote] демо цитат".PHP_EOL;
    }
}
