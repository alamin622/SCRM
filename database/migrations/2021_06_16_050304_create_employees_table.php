<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id')->unsigned()->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('role_id')->unsigned()->nullable();
            $table->string('phone');
            $table->text('present_address');
            $table->text('permanent_address')->nullable();
            $table->string('image')->nullable();
            $table->string('shop_name');
            $table->string('nid_number')->nullable();
            $table->string('nid_image')->nullable();
            $table->string('shop_image')->nullable();
            $table->text('religion')->nullable();
            $table->date('birthdate')->nullable();
            $table->date('marriage_dob')->nullable();
            $table->string('family_member')->nullable();
            $table->text('father_name')->nullable();
            $table->text('mother_name')->nullable();
            $table->string('occupation')->nullable();
            $table->string('business_year')->nullable();
            $table->string('number_of_children')->nullable();
            $table->date('children_dob')->nullable();
            $table->integer('division_id')->unsigned()->nullable();
            $table->integer('zone_id')->unsigned()->nullable();
            $table->integer('area_id')->unsigned()->nullable();
            /* $table->unsignedInteger('area_id')->nullable();
             $table->foreign('area_id')->references('id')->on('areas');*/

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
        Schema::dropIfExists('employees');
    }
}
