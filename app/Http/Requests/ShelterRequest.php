<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ShelterRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:shelters',
            'location' => 'required|min:2',
        ];
    }

    public function all()
    {
        $attributes = parent::all();

        $attributes['password'] = bcrypt($attributes['password']);

        return $attributes;
    }

}
