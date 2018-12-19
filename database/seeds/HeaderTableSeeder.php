<?php

use Illuminate\Database\Seeder;

class HeaderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('header')->insert([
			'h1'         => '¡Certifícate con nosotros!',
			'sub'        => 'Talleres Lean-Six Sigma',
			'img'        => 'bg.jpg',
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
