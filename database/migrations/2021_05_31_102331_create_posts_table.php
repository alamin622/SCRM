<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->time('visiting_hours')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->dateTime('nextVisitDateTime')->nullable();
            $table->date('VisitDate')->nullable();
            $table->integer('division_id')->unsigned()->nullable();
            $table->integer('zone_id')->unsigned()->nullable();
            $table->integer('area_id')->unsigned()->nullable();
            $table->longText('description');
            $table->integer('type_id')->unsigned()->nullable();
            $table->integer('customer_id')->unsigned()->nullable();
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
        Schema::dropIfExists('posts');
    }
}
