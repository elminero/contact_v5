<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Name extends Model
{
    use SoftDeletes;

    protected $fillable = ['first', 'last', 'middle', 'alias', 'bday', 'bmonth', 'byear', 'note'];

    protected $table = 'names';



}

