$(function() {
    var action;
    document.getElementById("tags").focus();

    $("#tags").autocomplete({

        minLength: 2,

        source: "models/source.php",

        focus: function (event, ui) {
            $("#topics").val(ui.item.label);
            return false;
        },

        select: function( event, ui ) {


            //    $("#results").text(ui.item.value);

            $("#tagValue").val(ui.item.id);

            action = "profile.php?id="+ui.item.id;


            document.getElementById("searchForm").setAttribute("action", action);

        }

    });
});
