var isValid = false;
var openHeaderStyle="<header style='margin-top: 0px; font-family: BlairMdITC; color: white;font-size: 11pt;'>";
var closeHeaderStyle = "<header>";
var errorText = "Ошибочка вышла.";
var successText = "Мы успешно тебя подписали, и уведомим одним из первых!";
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
        setInfo1('');
    }
}

function clearEmailInputSecond()
{
    var email = $('#emailSecond');
    var value = email.val();
    if (value =='')
    {
        setInfo2('');
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
            setInfo1('');
        }
        if(!isValid){
            //$(this).css({'border' : '1px solid #ff0000'});
            setInfo1(errorText);
        }
    } else {
        isValid = false;
        //email.css({'border' : '1px solid #ff0000'});
        setInfo1('');
    }
    document.getElementById('emailDiv').style.backgroundImage =
        'url("/newImg/staticTextBoxBackground.png")';
}
    function setInfo1(text){
       $('#valid').text(text);
    }

    function setInfo2(text){
        $('#validSecond').text(text);
    }


function validateForSecondEmailAndChangeBackGroundBack(){
    var email = $('#emailSecond');
    var value = email.val();
    if(value != '') {
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        isValid = pattern.test(value);
        if(isValid){
            //email.css({'border' : '1px solid #569b44'});
            setInfo2('');
        }
        if(!isValid){
            //$(this).css({'border' : '1px solid #ff0000'});
            setInfo2(errorText);
        }
    } else {
        isValid = false;
        //email.css({'border' : '1px solid #ff0000'});
        setInfo2('');
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

    $("#scrollDown").click(function(){
        document.scrollTop = 10;
    });

    $('#emailSecond').blur(validateForSecondEmailAndChangeBackGroundBack);
    $('#emailSecond').on('keyup', clearEmailInputSecond);
    $('#emailSecond').focus(emailSecondChangeBackground);

    $('#submitButton').click(function(){
        validateAndChangeBackGroundBack();
        if(isValid){
            var url = 'send_email.php?email=' + $('#email').val();
            $.get(url).done(function(data) {
                setInfo1(successText);
//                 alert( "success" );
            });
        }
        return false;
    });

    $('#submitButtonSecond').click(function(){
        validateForSecondEmailAndChangeBackGroundBack();
                if(isValid){
                    var url = 'send_email.php?email=' + $('#emailSecond').val();
                    $.get(url).done(function(data) {
                    setInfo2(successText);
                //                alert( "success" );
                    });
                }
                return false;
    });

    $("#divHelper").click(function(){
        hidePopup();
    });

//    RockButton Mouse Behavior
    document.getElementById("rockButton").onmouseout=function()
    {
        document.getElementById("rockButton").src="/newImg/staticRockButton.png"
        document.getElementById("rockDivWrapper").style.backgroundImage='none';
    }
    document.getElementById("rockButton").onmouseover=function()
    {
        document.getElementById("rockButton").src='/newImg/hoverRockButton.png';
        document.getElementById("rockDivWrapper").style.backgroundImage='url("/newImg/rockButtonHoverBackground.png")';
    };

//    LikeButton Mouse Behavior
    document.getElementById("likeButton").onmouseout=function()
    {
        document.getElementById("likeButton").src="/newImg/staticLikeButton.png"
        document.getElementById("likeDivWrapper").style.backgroundImage='none';
    }
    document.getElementById("likeButton").onmouseover=function()
    {
        document.getElementById("likeButton").src='/newImg/hoverLikeButton.png';
        document.getElementById("likeDivWrapper").style.backgroundImage='url("/newImg/hoverButtonsBackground.png")';
    };
    document.getElementById("likeButton").onmousedown=function()
    {
        document.getElementById("likeDivWrapper").style.backgroundImage='url("/newImg/pressedButtonsBackground.png")';
    }
    document.getElementById("likeButton").onmouseup=function()
    {
        document.getElementById("likeDivWrapper").style.backgroundImage='url("/newImg/hoverButtonsBackground.png")';
    }

    //    DisLikeButton Mouse Behavior
    document.getElementById("dislikeButton").onmouseout=function()
    {
        document.getElementById("dislikeButton").src="newImg/staticDislikeButton.png"
        document.getElementById("dislikeDivWrapper").style.backgroundImage='none';
    }
    document.getElementById("dislikeButton").onmouseover=function()
    {
        document.getElementById("dislikeButton").src='/newImg/hoverDislikeButton.png';
        document.getElementById("dislikeDivWrapper").style.backgroundImage='url("/newImg/hoverButtonsBackground.png")';
    };
    document.getElementById("dislikeButton").onmousedown=function()
    {
        document.getElementById("dislikeDivWrapper").style.backgroundImage='url("/newImg/pressedButtonsBackground.png")';
    }
    document.getElementById("dislikeButton").onmouseup=function()
    {
        document.getElementById("dislikeDivWrapper").style.backgroundImage='url("/newImg/hoverButtonsBackground.png")';
    }

    $("#rockButton").click(function(){
        showPopup("Эта кнопка перенесет тебя на лучшую похожую страницу", "-215px");
    });

    $("#likeButton").click(function(){
        showPopup("<b>Супер! Ты оценил эту страницу!</b><br> Теперь мы можем предложить тебе похожие.","-135px");
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
        $("#popupText").html(openHeaderStyle+text+closeHeaderStyle);
        document.getElementById("clickResultPopup").style.marginTop=marginTop;
        document.getElementById("buttonsDescriptionContainer").style.display="none";
    }
});
