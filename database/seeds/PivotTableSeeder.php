<?php

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Person;

class PivotTableSeeder extends Seeder {

    /**
     * Seed the pivot tables
     *
     * @return void
     */
    public function run()
    {
        $this->seedCurrentState();

        /*
         * TODO: Add additional entries
         */
    }

    /**
     * Seed the current keepers and adopters.
     */
    private function seedCurrentState()
    {
        $people = Person::all();

        foreach ($people as $person)
        {
            $animals_adopted = $person->adopted;

            if (!is_null($animals_adopted))
            {
                foreach ($animals_adopted as $animal)
                {
                    $person->animalsAdopted()->attach($animal->id);
                }
            }

            $animals_sheltered = $person->sheltered;

            if (!is_null($animals_sheltered))
            {
                foreach ($animals_sheltered as $animal)
                {
                    $person->animalsSheltered()->attach($animal->id);
                }
            }
        }
    }

}
