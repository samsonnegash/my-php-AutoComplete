 $(function () {
          var getData = function (request, response) {
            $.getJSON(
                "json.php?q=" + request.term,
                function (data) { 
                    response(data); 
                });
        };
     
        var selectRow = function (event, ui) {
            $("#search").val(ui.item.value);  
            return false;
        }
     
        $("#search").autocomplete({
            source: getData,
            select: selectRow,
            minLength: 1
        });
    });