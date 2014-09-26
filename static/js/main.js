$(document).ready(function() {
    // assign variable for div with id='answer'
    var answer = $('#answer'); 

    $('form').submit(function(event) {
        // prevent handling of the form request
        event.preventDefault();  
        
        // send form data to server
        $.ajax({
            type: 'GET',
            url: $('form').attr('action'),
            data: $('form').serialize(),
            })

            // handle successful response from server
            .done(function(response) {
                // Set the result to  html page
                $(answer).text(response);
            })

            // handle errors
            .fail(function(data){
                // if error occur show it
                if (data.responseText !== '') {
                    $(answer).text(data.responseText);
                } else {
                    $(answer).text('Oops! An error occured.');
                }
            });
    }); 

});