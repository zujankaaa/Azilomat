<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSheltersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('shelters', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('email')->unique()->default('');
            $table->string('password')->default('');
            $table->rememberToken();
            $table->string('name');
            $table->string('location');
            $table->integer('validated')->unsigned()->default(0);
            $table->integer('representative_id')->unsigned()->nullable()->default(NULL);
            $table->timestamps();

            $table->foreign('representative_id')
                ->references('id')
                ->on('people')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::drop('shelters');
    }

}
