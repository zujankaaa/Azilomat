<?php

use App\Animal;
use App\Person;
use App\Shelter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class AnimalTableSeeder extends Seeder {

    /**
     * Seed the animals table
     *
     * @return void
     */
    public function run()
    {
        Animal::create([
            'name' => 'Fido',
            'type' => 'Pas',
            'breed' => 'Labrador',
            'age' => 3,
            'description' => 'Neki pas Fido',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Baz shelter')->first()->id,
        ]);

        Animal::create([
            'name' => 'Fido',
            'type' => 'Pas',
            'age' => 1,
            'description' => 'Neki drugi pas Fido',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Bar shelter')->first()->id,
        ]);

        Animal::create([
            'name' => 'Rex',
            'type' => 'Pas',
            'breed' => 'Njemacki Ovcar',
            'age' => 8,
            'description' => 'Neki pas Rex',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Foo shelter')->first()->id,
            'adopter_id' => Person::findByNameOrFail('Baz Fooski')->first()->id,
        ]);

        Animal::create([
            'name' => 'Kitty',
            'type' => 'Macka',
            'age' => 2,
            'sterilized' => true,
            'description' => 'Neka macka Kitty',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Foo shelter')->first()->id,
            'adopter_id' => Person::findByNameOrFail('Baz Fooski')->first()->id,
        ]);

        Animal::create([
            'name' => 'Horsey',
            'type' => 'Konj',
            'age' => 4,
            'urgent' => true,
            'description' => 'Neki konj Horsey',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Foobaz shelter')->first()->id,
            'keeper_id' => Person::findByNameOrFail('Bar Barski')->first()->id,
        ]);

        Animal::create([
            'name' => 'Froggy',
            'type' => 'Zaba',
            'age' => -1,
            'urgent' => true,
            'description' => 'Neka zaba Froggy',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Foo shelter')->first()->id,
            'keeper_id' => Person::findByNameOrFail('Bar Barski')->first()->id,
        ]);

        Animal::create([
            'name' => 'Doge',
            'type' => 'Pas',
            'age' => -1,
            'urgent' => true,
            'description' => 'Much wow, many keep, such beautiful',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Baz shelter')->first()->id,
            'keeper_id' => Person::findByNameOrFail('Baz Fooski')->first()->id,
        ]);

        Animal::create([
            'name' => 'Doge',
            'type' => 'Pas',
            'age' => -1,
            'urgent' => true,
            'description' => 'Much wow, many adopt, such beautiful',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Baz shelter')->first()->id,
            'adopter_id' => Person::findByNameOrFail('Baz Fooski')->first()->id,
        ]);

        Animal::create([
            'name' => 'Doge',
            'type' => 'Pas',
            'age' => -1,
            'urgent' => true,
            'description' => 'Much wow, many shelter only :<, such beautiful',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Bar shelter')->first()->id,
        ]);

        Animal::create([
            'name' => 'Doge',
            'type' => 'Pas',
            'age' => -1,
            'urgent' => true,
            'description' => 'Much wow, many invalid shelter, such sad and nonexistent at the moment',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('nonValid shelter')->first()->id,
        ]);

        Animal::create([
            'name' => 'Doge',
            'type' => 'Pas',
            'description' => 'Much wow, many invalid shelter, such ninja',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('nonValid shelter')->first()->id,
        ]);

        Animal::create([
            'name' => 'Doge',
            'type' => 'Pas',
            'age' => -1,
            'urgent' => true,
            'description' => 'Much wow, many valid shelter, such happy and visible',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Baz shelter')->first()->id,
        ]);

        Animal::create([
            'name' => 'Doge',
            'type' => 'Pas',
            'urgent' => true,
            'description' => 'Much wow, many valid shelter, such happy and existent',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Bar shelter')->first()->id,
        ]);

        Animal::create([
            'name' => 'Doge',
            'type' => 'Pas',
            'description' => 'Much wow, many valid shelter, such can see, beautiful adopt',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Foo shelter')->first()->id,
            'adopter_id' => Person::findByNameOrFail('Baz Barski')->first()->id,
        ]);

        Animal::create([
            'name' => 'Cate',
            'type' => 'Macka',
            'description' => 'Much meow, many valid shelter, such can see',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Foo shelter')->first()->id,
        ]);

        Animal::create([
            'name' => 'Cate',
            'type' => 'Macka',
            'description' => 'Much meow, many invalid shelter, such invisible.',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('nonValid shelter')->first()->id,
        ]);

        Animal::create([
            'name' => 'Cate',
            'type' => 'Macka',
            'description' => 'Much meow, many invalid shelter, such ninja',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('nonValid shelter')->first()->id,
        ]);

        Animal::create([
            'name' => 'Cate',
            'type' => 'Macka',
            'urgent' => true,
            'description' => 'Much meow, many valid shelter, such visible',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Bar shelter')->first()->id,
            'keeper_id' => Person::findByNameOrFail('Foobaz Barski')->first()->id,
        ]);

        Animal::create([
            'name' => 'Cate',
            'type' => 'Macka',
            'description' => 'Much meow, many valid shelter, many no ninja :<, but adopt much!',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Foo shelter')->first()->id,
            'adopter_id' => Person::findByNameOrFail('Foobar Bazski')->first()->id,
        ]);

        Animal::create([
            'name' => 'Froge',
            'type' => 'Zaba',
            'description' => 'Much croak, eat fly, majestic',
            'arrived_at' => Carbon::now(),
            'shelter_id' => Shelter::findByNameOrFail('Bar shelter')->first()->id,
            'adopter_id' => Person::findByNameOrFail('Foobaz Barski')->first()->id,
        ]);
    }

}
