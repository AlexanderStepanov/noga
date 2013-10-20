var isValid = false;
var openHeaderStyle="<header style='margin-top: 0px; font-family: BlairMdITC; color: white;font-size: 11pt;'>";
var closeHeaderStyle = "<header>";
var errorText = "Ошибочка вышла.";
var _currentX = 0;
var _currentY = 0;
var _delay = 100;
var _circleCenterX = 128;
var _circleCenterY = 122;
var _currentAngle = 272;
var _radius = 118;
var _lastPoint = new Object();

function clearEmailInput()
{
    var email = $('#email');
    var value = email.val();
    if (value =='')
    {
        $('#valid').text('');
    }
}

function clearEmailInputSecond()
{
    var email = $('#emailSecond');
    var value = email.val();
    if (value =='')
    {
        $('#validSecond').text('');
    }
}

function validateAndChangeBackGroundBack(){
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
        $('#valid').text('');
    }
    document.getElementById('emailDiv').style.backgroundImage =
        'url("/newImg/staticTextBoxBackground.png")';
}

function validateForSecondEmailAndChangeBackGroundBack(){
    var email = $('#emailSecond');
    var value = email.val();
    if(value != '') {
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        isValid = pattern.test(value);
        if(isValid){
            //email.css({'border' : '1px solid #569b44'});
            $('#validSecond').text('');
        }
        if(!isValid){
            //$(this).css({'border' : '1px solid #ff0000'});
            $('#validSecond').text(errorText);
        }
    } else {
        isValid = false;
        //email.css({'border' : '1px solid #ff0000'});
        $('#validSecond').text('');
    }

    document.getElementById('emailDivSecond').style.backgroundImage =
        'url("/newImg/staticTextBoxBackground.png")';
}
function emailChangeBackground()
{
    document.getElementById('emailDiv').style.backgroundImage =
        'url("/newImg/focusedTextBoxBackground.png")';
}

function emailSecondChangeBackground()
{
    document.getElementById('emailDivSecond').style.backgroundImage =
        'url("/newImg/focusedTextBoxBackground.png")';
}

$(document).ready(function() {

    $(".main").onepage_scroll();
    $('#email').blur(validateAndChangeBackGroundBack);
    $('#email').on('keyup', clearEmailInput);
    $('#email').focus(emailChangeBackground);


    $('#emailSecond').blur(validateForSecondEmailAndChangeBackGroundBack);
    $('#emailSecond').on('keyup', clearEmailInputSecond);
    $('#emailSecond').focus(emailSecondChangeBackground);

    $('#submitButton').click(function(){
        validateAndChangeBackGroundBack();
        if(isValid){
            var url = 'send_email.php?email=' + $('#email').val();
            $.get(url).done(function(data) {
                    alert( "success" );
                });
        }

        return false;
    });

    $('#submitButtonSecond').click(function(){
        validateForSecondEmailAndChangeBackGroundBack();
        return isValid;
    });

    $("#divHelper").click(function(){
        hidePopup();
    });

    $("#rockButton").click(function(){
        showPopup("Эта кнопка перенесет тебя в мир правдивой<br> информации!!","-190px");
    });

    $("#likeButton").click(function(){
        showPopup("Здорово! Ты только что оценил одну из страниц!<br> Теперь мы можем предложить тебе похожие.","-130px");
    });

    $("#dislikeButton").click(function(){
        showPopup("Ну что же.. теперь мы будем реже<br> предлагать эту страницу другим. Спасибо!","-95px");
    });

    function hidePopup(){
        document.getElementById("clickResultPopup").style.display="none";
        document.getElementById("buttonsDescriptionContainer").style.display="inline";
    }

    function showPopup(text,marginTop){
        $("#clickResultPopup").show();
        $("#clickResultPopup").html(openHeaderStyle+text+closeHeaderStyle);
        document.getElementById("clickResultPopup").style.marginTop=marginTop;
        document.getElementById("buttonsDescriptionContainer").style.display="none";
    }
});
