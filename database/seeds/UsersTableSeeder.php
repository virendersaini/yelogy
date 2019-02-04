<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('model_has_roles')->truncate();

        app('DB')::table("users")
        	->insert([
        		[
	        		"name" => "Admin",
	        		"email" => "admin@gmail.com",
                    "mobile" =>"9988776655",
	        		"password" => bcrypt("123456"),
	        		"created_at" => carbon()->now(),
	                "updated_at" => carbon()->now(),
        		],
        	]);
        app('DB')::table("model_has_roles")
            ->insert([
            	[
	                "role_id" => "1",
	                "model_type" => "App\User",
	                "model_id" => 1
            	],
           	]);


    }
}
