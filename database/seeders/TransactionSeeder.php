<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\ChildUser;
use App\Models\Transaction;
use App\Models\vendor;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $child = ChildUser::all()->random();
        $card=Card::all()->random();
        $vendor = vendor::all()->random();
        $transaction = new Transaction();
        $transaction->card_number = $card->card_number;
        $transaction->vendor_name = $vendor->name;
        $transaction->transaction_amount = $faker->numberBetween(1000,5000);
        $transaction->limit_balance = $child->monthly_limit;
        $transaction->save();
    }
}
