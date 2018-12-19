<?php

use Illuminate\Database\Seeder;

class BreakTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('break')->insert([
			'h1'         => '¡Mejora tu vida con nosotros!',
			'img'        => 'figura-1.jpg',
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
