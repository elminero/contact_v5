<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = ['type', 'country', 'state', 'city', 'street', 'postal_code', 'note'];

    protected $table = 'addresses';


    public function name()
    {
        return $this->belongsTo(Name::class);
    }
}
