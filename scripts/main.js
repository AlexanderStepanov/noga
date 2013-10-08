var isValid = false;
var errorText = "На такой адрес приглашение не придет :)";
var _currentX = 0;
var _currentY = 0;
var _delay = 100;
var _circleCenterX = 128;
var _circleCenterY = 122;
var _currentAngle = 272;
var _radius = 118;
var _lastPoint = new Object();

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


function setAngle(angle, onExecuted){
    var angleToSet = 0;// = angle;

    while(_currentAngle != angle){
        var iterationStep = _radius < 50 &&
            (Math.abs(angle - _currentAngle)) > 1 ? 2 : 1;

        if(_currentAngle > angle) {
            _currentAngle -= iterationStep;
        }
        else{
            _currentAngle += iterationStep;
        }
        angleToSet = _currentAngle;
        var alpha = Math.PI * 2;
        angleToSet *= Math.PI / 180;
        var theta = alpha;

        var pointx  =  Math.floor(Math.cos( theta + angleToSet) * _radius);
        var pointy  = Math.floor(Math.sin( theta + angleToSet) * _radius );

        var xx = pointx + _circleCenterX;
        var yy = pointy + _circleCenterY;

        setTimeout(function(x, y, isLast){
            return function(){
                setCoordinates(x,y);
                if(isLast && onExecuted != null){
                    onExecuted();
                }
            } ;
        }(xx, yy, _currentAngle == angle), _delay);
        _lastPoint.x = xx;
        _lastPoint.y = yy;
        _delay += 30;
    }
}

function moveTo(x, y){
    var point = new Object();
    point.x = Math.round(x);
    point.y = Math.round(y);

    moveNext(point);
}

function moveNext(nextPoint){
    //console.log(new Date() + ": moving to " + nextPoint.x + " " + nextPoint.y);

    var differenceBetweenXs = Math.abs(nextPoint.x - _lastPoint.x);
    var differenceBetweenYs = Math.abs(nextPoint.y - _lastPoint.y);

    var allIterations = differenceBetweenXs > differenceBetweenYs ?
        differenceBetweenXs : differenceBetweenYs;
    var oneIterationXStep = differenceBetweenXs / allIterations;
    var oneIterationYStep = differenceBetweenYs / allIterations;

    var iterations = 0;

    while(iterations < allIterations){
        iterations++;

        setTimeout(function(xStep, yStep, nPoint){
            return function(){ MoveToNextPoint(xStep, yStep, nPoint);}
        }(oneIterationXStep, oneIterationYStep, nextPoint), _delay);

        _delay += 30;
    }
}



function MoveToNextPoint(oneIterationXStep, oneIterationYStep, nextPoint){
    var previousX = _currentX;
    var previousY = _currentY;
    _currentX = makeCloser(_currentX, nextPoint.x, oneIterationXStep);
    _currentY = makeCloser(_currentY, nextPoint.y, oneIterationYStep);

//            console.log("MoveToNextPoint: oneIterationXStep: " + oneIterationXStep +
//            "; oneIterationYStep: " + oneIterationYStep + "; nextPoint.x: " + nextPoint.x +
//            "; nextPoint.y: " + nextPoint.y + "; previousX: " + previousX +
//            "; previousY: " + previousY + "; currentX: " + _currentX + "; currentY: " + _currentY);

    setCoordinates(_currentX, _currentY);
}

function setCoordinates(x, y){
    _currentX = x;
    _currentY = y;

    $('#myDiv').css("margin-left", Math.round(x));
    $('#myDiv').css("margin-top", Math.round(y));
}

function makeCloser(current, mustBe, closerValue){
    return current >= mustBe? current - closerValue : current + closerValue;
}

function startMoving() {
    setAngle(95);
    setAngle(165);
    moveTo(42, 140);
    _radius = 88;
    setAngle(260);
    setAngle(235);
    moveTo(92, 72);
    _radius = 60;
    setAngle(90);
    moveTo(132, 208);
    _radius = 88;
    setAngle(125);
    setAngle(10);
    setAngle(90);
    moveTo(128, 186);
    _radius = 60;
    setAngle(375);
    setAngle(325);
    moveTo(156, 101);

    _radius = 32;
    setAngle(20);
    setAngle(325);
    moveTo(180, 90);
    _radius = 60;
    setAngle(90);
    moveTo(132, 208);
    _radius = 88;
    setAngle(125);
    setAngle(10);
    setAngle(90);
    moveTo(128, 184);
    _radius = 60;
    setAngle(240);
    moveTo(75, 55);
    _radius = 88;
    setAngle(170);
    moveTo(12, 146);
    _radius = 118;
    setAngle(100);
    setAngle(270, startMoving);

    _delay = 100;
}