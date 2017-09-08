<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Phone extends Model
{
    use SoftDeletes;

    protected $fillable = ['type', 'number',  'note'];

    protected $table = 'phones';


    public function name()
    {
        return $this->belongsTo(Name::class);
    }

}
