<?php
namespace App\Repositories;

use Carbon\Carbon;

class Names
{

    public function dob($byear, $bmonth, $bday, $note)
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