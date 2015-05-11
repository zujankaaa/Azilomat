<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeopleTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('people', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('email')->unique()->default('');
            $table->string('password')->default('');
            $table->string('first_name')->default('');
            $table->string('last_name')->default('');
            $table->string('oib', 11)->unique()->default('');
            $table->string('phone_no')->nullable()->unique()->default(NULL);
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
        Schema::drop('people');
    }

}
