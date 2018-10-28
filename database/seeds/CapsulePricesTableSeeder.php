<?php

use Illuminate\Database\Seeder;
use App\Capsule_price;
use Carbon\Carbon;

class CapsulePricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $seeds = [
            [
                'capsule_id' => 1,
                'price' => 50,
                'date' => Carbon::createFromDate(2018, 8, 1)
            ],
            [
                'capsule_id' => 2,
                'price' => 100,
                'date' => Carbon::createFromDate(2018, 8, 1)
            ],
            [
                'capsule_id' => 3,
                'price' => 50,
                'date' => Carbon::createFromDate(2018, 8, 1)
            ],
            [
                'capsule_id' => 4,
                'price' => 50,
                'date' => Carbon::createFromDate(2018, 8, 1)
            ],
            [
                'capsule_id' => 1,
                'price' => 55,
                'date' => Carbon::createFromDate(2018, 8, 2)
            ],
            [
                'capsule_id' => 2,
                'price' => 120,
                'date' => Carbon::createFromDate(2018, 8, 3)
            ],
            [
                'capsule_id' => 4,
                'price' => 60,
                'date' => Carbon::createFromDate(2018, 8, 4)
            ]
        ];

        foreach ($seeds as $data) {
            $price = new Capsule_price;
            $price->capsule_id = $data['capsule_id'];
            $price->price = $data['price'];
            $price->created_at = $data['date'];
            $price->updated_at = $data['date'];
            $price->save();
        }
    }
}
