<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

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


    public static function dob($byear, $bmonth, $bday, $note)
    {
        $dob = null;

        if ($byear && $bmonth && $bday) {
            $dob = carbon::create($byear, $bmonth, $bday);
            $age = $dob->diffInYears(Carbon::now());
            $dob = ['dob'=>$dob->format('F j, Y'), 'age'=>$age, 'note'=>$note];
        }

        if (!$byear || !$bmonth || !$bday) {
            $dob = "unknow";
            $dob = ['dob'=>$dob, 'age'=>'unkown', 'note'=>$note];

            if ($byear || $bmonth || $bday) {
                $dob['dob'] = 'Incomplete - ';
            }

            if ($byear) {
                $dob['dob'] .= " Year: " . $byear;

                if ($bmonth) {
                    $dob['dob'] .= ", ";
                }
            }

            if ($bmonth) {
                $dob['dob'] .= " Month: " . date("F", strtotime($bmonth));

                if ($bday) {
                    $dob['dob'] .= ", ";
                }
            }

            if ($bday) {
                $dob['dob'] .= " Day: " . $bday;
            }
        }

        return $dob;
    }

}

