var isValid = false;
var errorText = "На такой адрес приглашение не придет :)";

function validate(){
    var email = $('#email');
    var value = email.val();
    if(value != '') {
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        isValid = pattern.test(value);
        if(isValid){
            //email.css({'border' : '1px solid #569b44'});
            $('#valid').text('');
        }
        if(!isValid){
            //$(this).css({'border' : '1px solid #ff0000'});
            $('#valid').text(errorText);
        }
    } else {
        isValid = false;
        //email.css({'border' : '1px solid #ff0000'});
        $('#valid').text(errorText);
    }
}

$(document).ready(function() {
    $(".main").onepage_scroll();

    $('#email').blur(validate);
    $('#submitButton').click(function(){
        validate();
        return isValid;
    });

    $(window).scroll(function() {

    });

    $(document).bind('mousewheel DOMMouseScroll', function(event) {
//        event.preventDefault();
//        var delta = event.originalEvent.wheelDelta || -event.originalEvent.detail;
//        init_scroll(event, delta);
//        var scrolledPixels = document.body.scrollTop;
//        //alert(scrolledPixels);
//        if(scrolledPixels > 2000) return;
//
//        var firstHeight = $("#first").height() /1.5;
//        var opacity = 1 - scrolledPixels / firstHeight;
//        $("#backgroundContainer").css("opacity", opacity);
    });
});