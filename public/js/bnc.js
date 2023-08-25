$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    $('#guess-form').submit(function(event) {
        event.preventDefault();
        let guess = $('#guess').val();
        let username = $('#username').val();
        $.ajax({
            url: '/ajax/make-guess',
            method: "POST",
            data: {guess: guess, username: username},
            dataType: "json",
            success: function(response) {
                console.log(response);
                const theDiv = document.getElementById("result");
                let score = $('#score').val();
                theDiv.innerHTML +=("<p>" + response.message[1] + "</p>");
                $('#score').val(parseInt(score)+1);

                $('#guess').val("");
                if(response.message[0] === 1){
                    $('#win').val(1);
                    $('#guess').prop('disabled', true);
                    $('#make-guess').prop('disabled', true);
                    $('#score').show();
                }
                console.log(response.message[2]);
            },
            error: function(response) {
                console.error(response);
            }
        });
    });
});
