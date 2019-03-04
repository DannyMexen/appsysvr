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
            $table->string('position');
            $table->integer('department_id');
            $table->integer('manager_id');
            $table->timestamps();
        });

        DB::table('employees')->insert([

            [
                'first_name' => 'Managing',
                'last_name' => 'Director',
                'user_id' => 1,
                'employee_number' => 'EN1000',
                'position' => 'Managing Director',
                'department_id' => 0,
                'manager_id' => 0
            ],

            [
                'first_name' => 'System',
                'last_name' => 'Administrator',
                'user_id' => 2,
                'employee_number' => 'EN0000',
                'position' => 'Admin',
                'department_id' => 0,
                'manager_id' => 0
            ]
        ]);
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
