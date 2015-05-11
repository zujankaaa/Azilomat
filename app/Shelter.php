<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Shelter extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'shelters';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'location',
        'username'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * Get the animals that belong to the shelter
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function animals()
    {
        return $this->hasMany('App\Animal');
    }

    /**
     * Find a shelter with it's name
     * @param $name
     * @return mixed
     */
    public static function findByNameOrFail($name)
    {
        if (!is_null($shelters = static::whereName($name))) {
            return $shelters;
        }

        throw ModelNotFoundException;
    }

    /**
     * Find a shelter by it's email
     * @param $email
     * @return mixed
     */
    public static function findByEmailOrFail($email)
    {
        if (!is_null($shelter = static::whereEmail($email)->first())) {
            return $shelter;
        }

        throw ModelNotFoundException;
    }

    /**
     * Find all the shelters in a given location
     * @param $location
     * @return mixed
     */
    public static function findByLocationOrFail($location)
    {
        if (!is_null($shelters = static::whereLocation($location))) {
            return $shelters;
        }

        throw ModelNotFoundException;
    }

}