$('#search_txt').keyup(function() {
    alert("hey");

    var txt = $(this).val();
    if (txt != '') {


    } else {
        $('#search_rslt').html('');
        $.ajax({

            url: "search.php",
            method: "GET",
            data: { search: txt },
            dataType: "text",
            success: function(data) {
                $('#fallList').html(data);
            }

        });
    }


});