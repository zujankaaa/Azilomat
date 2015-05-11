<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Person extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /**
     * Table name
     * @var string
     */
    protected $table = 'people';

    /**
     * Attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'oib',
        'phone_no',
        'email',
    ];

    /**
     * The attributes that are excluded from the JSON form
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the animals that a person currently has sheltered
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sheltered()
    {
        return $this->hasMany('App\Animal', 'keeper_id');
    }

    /**
     * Get the animals that a person currently has adopted
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adopted()
    {
        return $this->hasMany('App\Animal', 'adopter_id');
    }

    /**
     * Get the animals that a person has ever sheltered
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function animalsSheltered()
    {
        return $this
            ->belongsToMany('App\Animal', 'animal_keeper')
            ->withTimestamps()
            ->withPivot('returned_at');
    }

    /**
     * Get the animals that a person has ever adopted
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function animalsAdopted()
    {
        return $this
            ->belongsToMany('App\Animal', 'animal_adopter')
            ->withTimestamps()
            ->withPivot('returned_at');
    }


    /**
     * All of the adopters that have ever returned an animal
     * @param $query
     */
    public function scopeReturned($query)
    {
        $pivot = $this->animalsAdopted()->getTable();

        $base = $query->getQuery();
        $joins = array_fetch((array)$base->joins, 'table');

        $foreignKey = $this->animalsAdopted()->getForeignKey();

        if (!in_array($pivot, $joins)) {
            $query->join($pivot, $this->getQualifiedKeyName(), '=', $foreignKey);
        }

        $query->whereNotNull($pivot . '.returned_at');
    }

    /**
     * Find the people with the given full name
     * @param $name
     * @return mixed
     */
    public static function findByNameOrFail($name)
    {
        $name = explode(' ', $name);
        if (!is_null($people = static::whereFirstName($name[0])->whereLastName($name[1]))) {
            return $people;
        }

        throw ModelNotFoundException;
    }

    /**
     * Find a person with their OIB
     * @param $oib
     * @return mixed
     */
    public static function findByOibOrFail($oib)
    {
        if (!is_null($person = static::whereOib($oib)->first())) {
            return $person;
        }

        throw ModelNotFoundException;
    }

    /**
     * Find a person by his email
     * @param $email
     * @return mixed
     */
    public static function findByEmailOrFail($email)
    {
        if (!is_null($person = static::whereEmail($email)->first())) {
            return $person;
        }

        throw ModelNotFoundException;
    }

}
