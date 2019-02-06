<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('user_id');
            $table->string('employee_number');
            $table->string('nrc_number');
            $table->string('email');
            $table->string('position');
            $table->integer('department_id');
            $table->integer('manager_id');
            $table->timestamps();
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->string('employee_number', 6)->change();
            
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
