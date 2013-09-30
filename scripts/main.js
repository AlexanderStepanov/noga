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
    $('#email').blur(validate);

    $('#submitButton').click(function(){
        validate();
        return isValid;
    });

    var backgroudContainerHeight = null;

    $(window).scroll(function() {
        var scrolledPixels = document.body.scrollTop;
        if(scrolledPixels > 2000) return;

        var firstHeight = $("#first").height() / 2;
        var opacity = 1 - scrolledPixels / firstHeight;
        $("#backgroundContainer").css("opacity", opacity);

        if(backgroudContainerHeight == null){
            backgroudContainerHeight = parseInt($("#backgroundContainer").css("height").replace("px", ""));
        }

        var height = backgroudContainerHeight + scrolledPixels + 100;
//alert(height);
        $("#backgroundContainer").css("height", height + "px");
        //alert(document.body.scrollTop);
    });
});