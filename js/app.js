$(document).ready(function() {
    $('#Carousel').carousel({
        interval:   1000
    });


    $('.ajaxModel').click(function(){
        console.log("click in .ajaxModel....");
        console.log($(this).data('id'));
        let lexiconID = $(this).data('id');

        console.log("Lexicon ID ist "+lexiconID);
        console.log("Type of lexicon is"+typeof(lexiconID));

        // Wenn id ist -1, es wird eine neue emenet erstellt.
        if (lexiconID == -1){
            console.log("Calling the Adding a new item php script file");
            //$('#myModal').modal(options)
            // window.location.replace("editLexicon.php");
            // $("#newItemModalCenter").modal();
            
            
            // $.get('editLexicon.php', function (response) {
            //     console.log ("tpl file loaded");
            //     $("#custom-modal").html(response);
            //     $("#newItemModalCenter").modal('show');
            // });
          
            jQuery.ajax({
                type: "post",
                url: 'editLexicon.php',
                data: {lexiconID},
                success: function(obj) {
                    $("#custom-modal").html(obj);
                    $("#newItemModalCenter").modal('show');
                }
            });

        }else{
            // Creating an AJAX request ....
            console.log("Getting the data for "+lexiconID);
            $.ajax({
                url:'./inc/loadModal.inc.php',
                type:'post',
                data :{ lexiconID},
                success : function(response){
                    //console.log("RESPONSE IS "+response);
                    $('.modal-content').html(response);
                    $('#staticBackdrop').modal('show');  
                } 
            });
        }
    });
});