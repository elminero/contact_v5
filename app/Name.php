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


    public function addPhone($phone)
    {
        $this->phones()->create($phone);
    }


    public function emails()
    {
        return $this->hasMany(Email::class);
    }


    public function addEmail($email)
    {
        $this->emails()->create($email);
    }


    public function addresses()
    {
        return $this->hasMany(Address::class);
    }


    public function addAddress($address)
    {
        $this->addresses()->create($address);
    }


    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }


    public function addPicture($picture)
    {
        $this->pictures()->save($picture);
    }

}

