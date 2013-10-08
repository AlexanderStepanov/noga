var isValid = false;
var errorText = "На такой адрес приглашение не придет :)";
var _shipX = 0;
var _shipY = 0;
var _nextPoint = new Object();
var _isMoving = false;
var _delay = 0;
var _moveQueue = new Array();
var _circleCenterX = 136;
var _circleCenterY = 130;
var _angleDelay = 30;
var _currentAngle = 272;
var _radius = 118;

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

    startMoving();

    $(window).scroll(function() {
//        var scrolledPixels = document.body.scrollTop;
//        alert(scrolledPixels);
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


function setAngle(angle, onCompleted){
    var angleToSet = 0;// = angle;

    while(_currentAngle != angle){
        if(_currentAngle > angle) {
            _currentAngle--;
        }
        else{
            _currentAngle++;
        }
        angleToSet = _currentAngle;
        var alpha = Math.PI * 2;
        angleToSet *= Math.PI / 180;
        var theta = alpha;

        var pointx  =  Math.floor(Math.cos( theta + angleToSet) * _radius);
        var pointy  = Math.floor(Math.sin( theta + angleToSet) * _radius );

        var xx = pointx + _circleCenterX;
        var yy = pointy + _circleCenterY;

        moveTo(xx, yy, onCompleted);
    }
}

function moveTo(x, y){
    var point = new Object();
    point.x = Math.round(x);
    point.y = Math.round(y);
    _moveQueue.push(point);

    moveNext();
}

function moveNext(){
    if(_isMoving || _moveQueue.length == 0) return;

    setTimeout(function(){
        var nextPoint = dequeue();
        if(nextPoint == undefined) {
            finishMove();
            return;
        }
        _nextPoint = nextPoint;


        console.log("moving to " + _nextPoint.x + " " + _nextPoint.y);

        var differenceBetweenXs = Math.abs(_nextPoint.x - _shipX);
        var differenceBetweenYs = Math.abs(_nextPoint.y - _shipY);

        var allIterations = differenceBetweenXs > differenceBetweenYs ?
            differenceBetweenXs : differenceBetweenYs;
        var oneIterationXStep = differenceBetweenXs / allIterations;
        var oneIterationYStep = differenceBetweenYs / allIterations;

        var iterations = 0;

        _delay = 60;

        while(iterations < allIterations){
            iterations++;

            _delay += 60;
//                $("#log").append("test<br/>");

            setTimeout(function(){
                MoveToNextPoint(oneIterationXStep, oneIterationYStep);
            }, _delay);
        }
    }, _angleDelay);
    _angleDelay += 30;
}



function MoveToNextPoint(oneIterationXStep, oneIterationYStep){
    _shipX = makeCloser(_shipX, _nextPoint.x, oneIterationXStep);
    _shipY = makeCloser(_shipY, _nextPoint.y, oneIterationYStep);

    setCoordinates(_shipX, _shipY);

    if(isMovedToEnd())
    {
        finishMove();
    }
}

function setCoordinates(x, y){
    _shipX = x;
    _shipY = y;

    $('#myDiv').css("margin-left", Math.round(x));
    $('#myDiv').css("margin-top", Math.round(y));
}

function isMovedToEnd(){
    if(_shipX == _nextPoint.x){
        if(_shipY + 1 == _nextPoint.y) return true;
    }

    if(_shipY == _nextPoint.y){
        if(_shipX + 1 == _nextPoint.x) return true;
    }

    return Math.ceil(_shipX) >= _nextPoint.x && Math.ceil(_shipY) >= _nextPoint.y;
}

function finishMove(){
    setCoordinates(_nextPoint.x, _nextPoint.y);
    _isMoving = false;

    moveNext();
}

function dequeue(){
    var result = _moveQueue[0];
    if(result == undefined) return undefined;
    _isMoving = true;
    _moveQueue.splice(0, 1);

    if(result.x == _shipX && result.y == _shipY){
        return dequeue();
    }

    return result;
}

function makeCloser(current, mustBe, closerValue){
    return current >= mustBe? current - closerValue : current + closerValue;
}

function startMoving() {
    setCoordinates(138, 0);
    moveTo(138, 10);

    setAngle(95);
    setAngle(165);
    moveTo(50, 148);
    _radius = 88;
    setAngle(260);
    setAngle(235);
    moveTo(100, 80);
    _radius = 60;
    setAngle(90);
    moveTo(140, 216);
    _radius = 88;
    setAngle(125);
    setAngle(10);
    setAngle(90);
    moveTo(136, 192);
    _radius = 60;
    setAngle(375);
    setAngle(325);
    moveTo(164, 109);

    _radius = 32;
    setAngle(20);
    setAngle(325);
    moveTo(188, 98);
    _radius = 60;
    setAngle(90);
    moveTo(140, 216);
    _radius = 88;
    setAngle(125);
    setAngle(10);
    setAngle(90);
    moveTo(136, 192);
    _radius = 60;
    setAngle(240);
    moveTo(83, 63);
    _radius = 88;
    setAngle(180);
    moveTo(20, 193);
    _radius = 118;
    setAngle(100);
    setAngle(270);
}