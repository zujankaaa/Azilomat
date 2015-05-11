<?php

use App\Person;
use App\Shelter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ShelterTableSeeder extends Seeder {

    /**
     * Seed the shelters table
     *
     * @return void
     */

    public function run()
    {
        Shelter::create([
            'email' => 'foo@example.com',
            'name' => 'Foo shelter',
            'location' => 'Rijeka',
            'password' => bcrypt('password'),
            'validated' => 1,
            'representative_id' => Person::findByNameOrFail('Foo Barski')->first()->id,
        ]);

        Shelter::create([
            'email' => 'bar@example.com',
            'name' => 'Bar shelter',
            'location' => 'Zagreb',
            'password' => bcrypt('password'),
            'validated' => 1,
            'representative_id' => Person::findByNameOrFail('Bar Fooski')->first()->id,
        ]);

        Shelter::create([
            'email' => 'baz@example.com',
            'name' => 'Baz shelter',
            'location' => 'Osijek',
            'password' => bcrypt('password'),
            'validated' => 1,
            'representative_id' => Person::findByNameOrFail('Baz Fooski')->first()->id,
        ]);

        Shelter::create([
            'email' => 'foobaz@example.com',
            'name' => 'Foobaz shelter',
            'location' => 'Zadar',
            'password' => bcrypt('password'),
            'validated' => 1,
            'representative_id' => Person::findByNameOrFail('Foobaz Barski')->first()->id,
        ]);

        Shelter::create([
            'email' => 'nonValid@example.com',
            'name' => 'nonValid shelter',
            'location' => 'Rijeka',
            'password' => bcrypt('password'),
            'validated' => 0,
            'representative_id' => Person::findByNameOrFail('Foo Barski')->first()->id,
        ]);
    }

}
