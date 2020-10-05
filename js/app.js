$(document).ready(function() {
    $('#Carousel').carousel({
        interval:   1000
    });


    $('.ajaxModel').click(function(){
        console.log("click.");
        console.log($(this).data('id'));
        var lexiconID = $(this).data('id');
        // Creating an AJAX request ....
        console.log("Getting the data for "+lexiconID);
        $.ajax({
            url:'./inc/loadModal.inc.php',
            type:'post',
            data :{ lexiconID},
            success : function(response){
                console.log("RESPONSE IS "+response);
                $('.modal-content').html(response);
                $('#staticBackdrop').modal('show');  
            } 
        });
    });
});