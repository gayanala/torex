<?php

use App\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->delete();
        Subscription::create([
            'id' => 1,
            'organization_id' => 1,
            'name' => 'main',
            'stripe_id' => 'sub_BjE4mUEBCjk86q',
            'stripe_plan' => 'annually999999',
            'quantity' => 999999,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()

        ]);
    }
}
