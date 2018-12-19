<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('h1')->unique();
            $table->string('slug')->unique();
            $table->string('sub');
            $table->text('content', 100000);
            $table->text('list', 100000);
            $table->string('img');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
