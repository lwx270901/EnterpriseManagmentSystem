var reqBtn = $('#request-btn')
reqBtn.click(function (e) { 
    if($('#new-deadline').val() == ""){
        // alert('New deadline must be specified to request changes');
       $('#error').html('*New deadline must be specified to request changes');
    } else {

    }
});