<?php

use Illuminate\Database\Seeder;
use App\DataAccess\Eloquent\Don;

class DonShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Don::all() as $don) {
            \DB::table('don_shop')->insert([
                'don_id' => $don->id,
                'shop_id' => 1,
            ]);
        }
    }
}
