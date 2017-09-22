<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Name extends Model
{
    use SoftDeletes;

    protected $fillable = ['first', 'last', 'middle', 'alias', 'bday', 'bmonth', 'byear', 'note'];

    protected $table = 'names';


    public function phones()
    {
        return $this->hasMany(Phone::class);
    }


    public function emails()
    {
        return $this->hasMany(Email::class);
    }


    public function addresses()
    {
        return $this->hasMany(Address::class);
    }


    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

}

