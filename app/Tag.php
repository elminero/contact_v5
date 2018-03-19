<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Name;

class Tag extends Model
{

    protected $fillable = ['name'];

    public function Names()
    {
        return $this->belongsToMany(Name::class);
    }


    public function getRouteKeyName()
    {
        return 'name';
    }

}
