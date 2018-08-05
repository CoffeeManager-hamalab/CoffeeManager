<?php

use Illuminate\Database\Seeder;
use App\PurchaseHistory;

class PurchaseHistoriesTableSeeder extends Seeder
{
    private $seeds = [
        [
            'capsule_id' => 1,
            'user_id' => 1,
            'quantity' => 1
        ],
        [
            'capsule_id' => 1,
            'user_id' => 2,
            'quantity' => 1
        ],
        [
            'capsule_id' => 2,
            'user_id' => 2,
            'quantity' => 1
        ],
        [
            'capsule_id' => 3,
            'user_id' => 2,
            'quantity' => 1
        ],
        [
            'capsule_id' => 4,
            'user_id' => 2,
            'quantity' => 3
        ],
        [
            'capsule_id' => 2,
            'user_id' => 1,
            'quantity' => 1
        ],
        [
            'capsule_id' => 1,
            'user_id' => 1,
            'quantity' => 1
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->seeds as $data) {
            $history = new PurchaseHistory;
            $history->capsule_id = $data['capsule_id'];
            $history->user_id = $data['user_id'];
            $history->quantity = $data['quantity'];
            $history->save();
        }
    }
}
