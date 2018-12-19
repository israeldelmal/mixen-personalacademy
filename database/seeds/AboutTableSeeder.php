<?php

use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about')->insert([
			'h1'         => 'En Personal Academy nos dedicamos a brindar capacitaciones',
			'content'    => '<p>A través de talleres y cursos en las áreas y disciplinas más buscadas por las empresas actualmente.
            Contamos con instructores con más de 15 años de experiencia internacional en la impartición de 
            entrenamiento profesional.</p>
            <p>Nuestros talleres y cursos son interactivos y están diseñados para que el participante tenga una experiencia 
            de aprendizaje más completa y efectiva que los entrenamientos tradicionales.</p>
            <p>Todos nuestros talleres y cursos están debidamente registrados ante la STPS 
            (Secretaria del Trabajo y Previsión Social)</p>',
			'img'        => 'figura-1.jpg',
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
