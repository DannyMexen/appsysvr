<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendingActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('actor');
            $table->timestamps();
        });

        DB::table('pending_actions')->insert([

            ['actor' => 'Officer'],
            ['actor' => 'Manager'],
            ['actor' => 'Employee'],
            ['actor' => 'Complete'],
            ['actor' => 'Rejected']

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pending_actions');
    }
}
