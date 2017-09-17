<?php

use Illuminate\Support\Facades\DB;






$country_code = urlencode($_GET['country']) ;


Route::get('/subdivisions/{country_code}', 'SubdivisionsController@getSubdivisionsByCountryCode');

$subdivisions = '/subdivisions/'.$country_code;

// var_dump($subdivisions);

//$subdivisions = DB::table('subdivisions')->where('country_code', 'US')->get();

//   var_dump($subdivisions);


?>

<select id="stateSelect" class="input_text" name="state" style="width:245px; background-color:#B8F5B1; ">

    <?php foreach($subdivisions as $subdivision): ?>
    <option value="qwert"><?php echo $country_code; ?></option>
    <?php endforeach ?>

</select>




