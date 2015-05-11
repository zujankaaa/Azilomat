<?php

use App\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class PersonTableSeeder extends Seeder {

    /**
     * Seed the people table
     *
     * @return void
     */

    public function run()
    {
        Person::create([
            'email' => 'foo@example.com',
            'password' => bcrypt('password'),
            'first_name' => 'Foo',
            'last_name' => 'Barski',
            'oib' => '12345678901',
        ]);

        Person::create([
            'email' => 'bar@example.com',
            'password' => bcrypt('password'),
            'first_name' => 'Bar',
            'last_name' => 'Fooski',
            'oib' => '12345678902',
            'phone_no' => '098 991 7086',
        ]);

        Person::create([
            'email' => 'baz@example.com',
            'password' => bcrypt('password'),
            'first_name' => 'Baz',
            'last_name' => 'Fooski',
            'oib' => '12345678903',
        ]);

        Person::create([
            'email' => 'foobazski@example.com',
            'password' => bcrypt('password'),
            'first_name' => 'Foobaz',
            'last_name' => 'Barski',
            'oib' => '12345678904',
        ]);

        Person::create([
            'email' => 'barski@example.com',
            'password' => bcrypt('password'),
            'first_name' => 'Bar',
            'last_name' => 'Barski',
            'oib' => '12345678905',
        ]);

        Person::create([
            'email' => 'bazski@example.com',
            'password' => bcrypt('password'),
            'first_name' => 'Baz',
            'last_name' => 'Barski',
            'oib' => '12345678906',
        ]);

        Person::create([
            'email' => 'barbazski@example.com',
            'password' => bcrypt('password'),
            'first_name' => 'Bar',
            'last_name' => 'Bazski',
            'oib' => '12345678907',
        ]);

        Person::create([
            'email' => 'foobarbaz@example.com',
            'password' => bcrypt('password'),
            'first_name' => 'Foobar',
            'last_name' => 'Bazski',
            'oib' => '12345678908',
        ]);
    }

}
