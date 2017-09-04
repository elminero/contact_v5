<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Phone;

class Name extends Model
{
    use SoftDeletes;

    protected $fillable = ['first', 'last', 'middle', 'alias', 'bday', 'bmonth', 'byear', 'note'];

    protected $table = 'names';


    public function phones()
    {
        return $this->hasMany(Phone::class);
    }



}

