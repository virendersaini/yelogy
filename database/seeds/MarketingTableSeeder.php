<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;


class MarketingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_types =  json_decode(file_get_contents(database_path('seeds/.data/product_types.json')),true);

        if ($this->command->confirm('Do you wish to insert Form Data ?')) {
            /* Empty Tables */
            if($this->command->confirm('Truncate Data (Previous data will be deleted) ? ')){
                DB::table('product_types')->truncate();
            }
            
            /* Insert Data*/
            DB::table('product_types')->insert($product_types);
            $this->command->info("Product Types Seeded.");
		}
    }
}
