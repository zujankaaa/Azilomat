<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnimalsTable extends Migration {

    /**
     * Run the migrations.
     *
     * animals: The table that holds the animals
     *
     * animal_keeper: The pivot table for an animal and it's keeper that contains
     * 				  values of the entire time that a person is in a database.
     *
     * animal_adopter: The pivot table for an animal and it's adopter that contains
     * 				   values of the entire time that a person is in a database.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('animals', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->default('');
            $table->string('type')->default('');
            $table->string('breed')->default('Nepoznato');
            $table->integer('age')->default(-1);
            $table->boolean('urgent')->default(false);
            $table->boolean('sterilized')->default(false);
            $table->string('cripple')->nullable();
            $table->text('description')->default('');
            $table->timestamp('arrived_at');
            $table->integer('shelter_id')->unsigned();
            $table->integer('keeper_id')->unsigned()->nullable()->default(NULL);
            $table->integer('adopter_id')->unsigned()->nullable()->default(NULL);
            $table->timestamps();

            $table->foreign('shelter_id')
                ->references('id')
                ->on('shelters')
                ->onDelete('restrict');

            $table->foreign('keeper_id')
                ->references('id')
                ->on('people')
                ->onDelete('set null');

            $table->foreign('adopter_id')
                ->references('id')
                ->on('people')
                ->onDelete('set null');

        });

        Schema::create('animal_keeper', function(Blueprint $table)
        {
            /**
             * There probably need to be extra attributes here. Otherwise there is
             * a good possibility that the adopter and keeper table can be merged
             * into one table.
             */
            $table->integer('animal_id')->unsigned()->index();
            $table->integer('person_id')->unsigned()->index();
            $table->timestamp('returned_at')->nullable();
            $table->timestamps();

            $table->foreign('animal_id')
                ->references('id')
                ->on('animals')
                ->onDelete('cascade');

            $table->foreign('person_id')
                ->references('id')
                ->on('people')
                ->onDelete('cascade');
        });

        Schema::create('animal_adopter', function(Blueprint $table)
        {
            $table->integer('animal_id')->unsigned()->index();
            $table->integer('person_id')->unsigned()->index();
            $table->timestamp('returned_at')->nullable();
            $table->timestamps();

            $table->foreign('animal_id')
                ->references('id')
                ->on('animals')
                ->onDelete('cascade');

            $table->foreign('person_id')
                ->references('id')
                ->on('people')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::drop('animal_keeper');
        Schema::drop('animal_adopter');
        Schema::drop('animals');
    }

}
