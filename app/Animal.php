<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{

    /**
     * The database table used by the model
     * @var string
     */
    protected $table = 'animals';

    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'breed',
        'age',
        'urgent',
        'sterilized',
        'cripple',
        'description',
        'arrived_at'
    ];

    /**
     * Get the shelter than an animal belongs to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shelter()
    {
        return $this->belongsTo('App\Shelter');
    }

    /**
     * Get the keeper than an animal belongs to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function keeper()
    {
        return $this->belongsTo('App\Person', 'keeper_id');
    }


    /**
     * Get the person that the animal is currently adopted by
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adopter()
    {
        return $this->belongsTo('App\Person', 'adopter_id');
    }

    /**
     * Get all the adopters that an animal has ever been sheltered by
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function allKeepers()
    {
        return $this
            ->belongsToMany('App\Person', 'animal_keeper')
            ->withTimestamps()
            ->withPivot('returned_at');
    }

    /**
     * Get all the adopters that an animal has ever been adopted by
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function allAdopters()
    {
        return $this
            ->belongsToMany('App\Person', 'animal_adopter')
            ->withTimestamps()
            ->withPivot('returned_at');
    }

    /**
     * Scope the query into the urgent animals for adoption
     * @param $query
     */
    public function scopeUrgent($query)
    {
        $query->where('urgent', true);
    }

}
