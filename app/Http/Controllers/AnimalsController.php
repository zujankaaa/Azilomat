<?php namespace App\Http\Controllers;

use App\Animal;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Requests\AnimalRequest;

class AnimalsController extends Controller
{

    /**
     * Handles the animals route for GET
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $animals = Animal::all();

        return view('animals.index', compact('animals'));
    }

    /**
     * Display the animal
     * @param Animal $animal
     * @return \Illuminate\View\View
     */
    public function show(Animal $animal)
    {
        return view('animals.show', compact('animal'));
    }

    /**
     * Route to animal creation
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Route to animal editing
     * @param Animal $animal
     * @return \Illuminate\View\View
     */
    public function edit(Animal $animal)
    {
        return view('animals.edit', compact('animal'));
    }

    /**
     * Store a new animal in the database
     * @param AnimalRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AnimalRequest $request)
    {
        Animal::create($request->all());

        return redirect('animals');
    }

    /**
     * Update an existing animal in the database
     * @param Animal $animal
     * @param AnimalRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Animal $animal, AnimalRequest $request)
    {
        $animal->update($request->all());

        return redirect('animals');
    }

}
