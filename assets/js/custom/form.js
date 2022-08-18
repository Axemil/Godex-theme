$(function(){
    $("#submit").click(e => {
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
        let validation = true;
        if(!$('#author').val()){
            $('#author').css("border", "1px solid red");
            validation = false;
        } else {
            $('#author').css("border", "1px solid rgba(0,0,0,0)");
        }
        if(pattern.test($('#email').val()) == null || !pattern.test($('#email').val())){
            $('#email').css("border", "1px solid red");
            validation = false;
        } else {
            $('#email').css("border", "1px solid rgba(0,0,0,0)");
        }
        if(!$('#comment').val()){
            $('#comment').css("border", "1px solid red");
            validation = false;
        } else {
            $('#comment').css("border", "1px solid rgba(0,0,0,0)");
        }

        if(validation){
            $(this).trigger('submit');
        } else {
            e.preventDefault();
        }
    })

    $(".searcher-form_wrapper #searchsubmit").click(e => {
        // window.location.origin
        e.preventDefault();
        if($("#s").val()){
            window.location.replace(window.location.origin+"/blog/search/"+$("#s").val());
        }
    })

})