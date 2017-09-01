<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    protected $fillable = ['first_name', 'last_name', 'middle_name', 'alias', 'bday', 'bmonth', 'byear', 'note'];




}
// $dob = DateTime::createFromFormat('j-m-Y', '27-11-0000');
