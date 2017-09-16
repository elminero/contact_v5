<?php

use Illuminate\Support\Facades\DB;



$country_code = urlencode($_GET['country']) ;

//$subdivisions = DB::table('subdivisions')->where('country_code', 'US')->get();

//   var_dump($subdivisions);


?>

<select id="stateSelect" class="input_text" name="state" style="width:245px; background-color:#B8F5B1; ">


    <option value="qwert"><?php echo $country_code; ?></option>


</select>




