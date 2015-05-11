<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{


    /**
     * Show all the people
     * @return mixed
     */
    public function index()
    {
        return Person::all();
    }

    /**
     * Display a person
     * @param Person $person
     * @return \Illuminate\View\View
     */
    public function show(Person $person)
    {
        return view('people.show', compact('person'));
    }

    /**
     * Route to person creation
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('people.create');
    }

    /**
     * Route to editing a person
     * @param Person $person
     * @return \Illuminate\View\View
     */
    public function edit(Person $person)
    {
        return view('people.edit');
    }

    /**
     * Store a new person into the database
     * @param PersonRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PersonRequest $request)
    {
        /**
         * TODO: Check if redirection happens to people or a new creation
         */
        Person::create($request->all());
        return redirect('people');
    }

    /**
     * Update the existing person's information in the database
     * @param Person $person
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Person $person)
    {
        $person->update(Request::all());
        return redirect('people');
    }
}
