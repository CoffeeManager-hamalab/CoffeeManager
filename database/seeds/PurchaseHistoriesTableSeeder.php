<?php

use Illuminate\Database\Seeder;
use App\PurchaseHistory;
use Carbon\Carbon;

class PurchaseHistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            [
                'capsule_id' => 1,
                'user_id' => 1,
                'quantity' => 1,
                'date' => Carbon::createFromDate(2018, 8, 1)
            ],
            [
                'capsule_id' => 2,
                'user_id' => 1,
                'quantity' => 1,
                'date' => Carbon::createFromDate(2018, 8, 1)
            ],
            [
                'capsule_id' => 1,
                'user_id' => 1,
                'quantity' => 1,
                'date' => Carbon::createFromDate(2018, 8, 1)
            ],
            [
                'capsule_id' => 1,
                'user_id' => 2,
                'quantity' => 1,
                'date' => Carbon::createFromDate(2018, 8, 1)
            ],
            [
                'capsule_id' => 2,
                'user_id' => 2,
                'quantity' => 1,
                'date' => Carbon::createFromDate(2018, 8, 1)
            ],
            [
                'capsule_id' => 3,
                'user_id' => 2,
                'quantity' => 1,
                'date' => Carbon::createFromDate(2018, 8, 1)
            ],
            [
                'capsule_id' => 4,
                'user_id' => 2,
                'quantity' => 3,
                'date' => Carbon::createFromDate(2018, 8, 1)
            ],
            [
                'capsule_id' => 1,
                'user_id' => 2,
                'quantity' => 2,
                'date' => Carbon::createFromDate(2018, 8, 3)
            ],
            [
                'capsule_id' => 2,
                'user_id' => 2,
                'quantity' => 1,
                'date' => Carbon::createFromDate(2018, 8, 3)
            ],
            [
                'capsule_id' => 1,
                'user_id' => 2,
                'quantity' => 1,
                'date' => Carbon::createFromDate(2018, 8, 4)
            ]
        ];

        foreach ($seeds as $data) {
            $history = new PurchaseHistory;
            $history->capsule_id = $data['capsule_id'];
            $history->user_id = $data['user_id'];
            $history->quantity = $data['quantity'];
            $history->created_at = $data['date'];
            $history->updated_at = $data['date'];
            $history->save();
        }
    }
}
