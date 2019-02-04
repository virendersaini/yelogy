<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('roles')->insert(
        [
	        [
	            'name' => 'admin',
	            'guard_name' => 'admin',
	            'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
	        ],
	        [
	            'name' => 'customer',
	            'guard_name' => 'admin',
	            'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
	        ],
            [
                'name' => 'vendor',
                'guard_name' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
	    ]);
    }
}
