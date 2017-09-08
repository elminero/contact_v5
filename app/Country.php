<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Subdivision;

class Country extends Model
{
    protected $table = 'countries';


    public function subdivisions()
    {
        return $this->hasMany(Subdivision::class);
    }
}
