<?php

use Illuminate\Database\Seeder;
use App\Capsule;

class CapsulesTableSeeder extends Seeder
{
    private $master = [
        [
            "name" => "カフェオレ",
            "description" => "これはカフェオレです",
            "optimal_scale" => 6,
            "milk_scale" => 0,
            "price" => 55
        ],
        [
            "name" => "カプチーノ",
            "description" => "これはカプチーノです。\nミルクを使用します。",
            "optimal_scale" => 5,
            "milk_scale" => 1,
            "price" => 110
        ],
        [
            "name" => "レギュラーブレンド",
            "description" => "これはレギュラーブレンドです。",
            "optimal_scale" => 7,
            "milk_scale" => 0,
            "price" => 55
        ],
        [
            "name" => "宇治抹茶",
            "description" => "これは宇治抹茶です。",
            "optimal_scale" => 5,
            "milk_scale" => 0,
            "price" => 55
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->master as $data) {
            $capsule = new Capsule;
            $capsule->name = $data["name"];
            $capsule->description = $data["description"];
            $capsule->optimal_scale = $data["optimal_scale"];
            $capsule->milk_scale = $data["milk_scale"];
            $capsule->price = $data["price"];
            $capsule->save();
        }
    }
}
