<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <title>Search</title>
</head>
<body>


    <input id="search" type="text" class="form-control">
    <div id="stateCode"></div>


</body>
</html>

<script type="text/javascript">


  //  document.getElementById('stateCode').innerHTML = document.getElementById('search').valueOf();


var colors = ["1", "red", "blue", "green", "yellow", "brown", "black"];


var stateList = [
    {"stateCode": "CA", "stateName": "California"},
    {"stateCode": "AZ", "stateName": "Arizona"},
    {"stateCode": "NY", "stateName": "New York"},
    {"stateCode": "NV", "stateName": "Nevada"},
    {"stateCode": "OH", "stateName": "Ohio"}
];




$('#search').typeahead({

    source: function (query, process) {

      //  console.log('value : '+$('#search').val());


        states = [];
        map = {};

        $.each(stateList, function (i, state) {
            map[state] = state;
            states.push(state.stateName);
          //  console.log(state.stateCode);
        });

        process(states);


       // console.log(state.stateCode);

    }


}).on('typeahead:select', function (obj, datum) {
    console.log(state);
    console.log(datum.stateCode);
});



















  /*
  $('#search').on("typeahead:selected typeahead:autocompleted", function(e,datum) { " +
     "$('#stateCode').val() = datum.id; " +"})





    var path = '{{ route('autocomplete') }}';

    $('#search').focus().typeahead({

        minLength: 2,
        highlight: true,

        name: 'my-dataset',

        source: function(query, process) {
            return $.get(path, {query: query}, function(data){
                return process(data);
            });
        }
    });

*/
</script>