<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Shelter;
use Illuminate\Http\Request;
use App\Http\Requests\ShelterRequest;

class SheltersController extends Controller {


    public function index()
    {
        $shelters = Shelter::all();

        return view('shelters.index', compact('shelters'));
    }

    public function show(Shelter $shelter)
    {
        return view('shelters.show', compact('shelter'));
    }

    public function create()
    {
        return view('shelters.create');
    }

    public function edit(Shelter $shelter)
    {
        return view('shelters.edit', compact('shelter'));
    }


    public function store(ShelterRequest $request)
    {
        Shelter::create($request->all());

        return redirect('shelters');
    }


    public function update(Shelter $shelter, ShelterRequest $request)
    {
        $shelter->update($request->all());

        return redirect('shelters');
    }

    public function destroy($id)
    {
        //
    }

}
