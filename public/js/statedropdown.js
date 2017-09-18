/**
 * Created by ian on 9/16/17.
 */

$(document).ready(function() {

    $('select[name="country"]').on('change', function(){

        var country_code = $(this).val();

        $.ajax({
            url:'/subdivisions/'+country_code,
            type:"GET",
            dataType:"json",
            beforeSend: function() {
            // $('#loader').css("visibility", "visible")
            },

            success:function(data) {
                $('select[name="state"]').empty();
                //document.getElementById("rude").innerHTML = data;
                $.each(data, function(value, key) {
                    $('select[name="state"]').append('<option value="'+key+'">'+key+'</option>');
                });
            }

        });

    });

});