<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Picture extends Model
{
    use SoftDeletes;

    protected $fillable = ['path_to_file', 'caption', 'avatar'];

    protected $table = 'pictures';


    public function name()
    {
        return $this->belongsTo(Name::class);
    }
}


