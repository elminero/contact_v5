$(function() {

    var action;

    document.getElementById("search_text").focus();

    $("#search_text").autocomplete({

        minLength: 2,
        source: "/names/autocomplete",

        focus: function (event, ui) {
          //  $("#topics").val(ui.item.label);
            return false;
        },

        select: function( event, ui ) {

            $("#results").text(ui.item.value);


            $("#tagValue").val(ui.item.id);
            action = "/profile/"+ui.item.id;
            document.getElementById("searchForm").setAttribute("action", action);

        }

    });
});
