<!DOCTYPE html>
<meta charset="UTF-8" xmlns="http://www.w3.org/1999/html"/>

<html>
<head>
    <script type="text/javascript" src="scripts/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="scripts/main.js"></script>
    <script type="text/javascript" src="jquery.onepage-scroll.js" ></script>
    <link type="text/css" rel="stylesheet" href="style.css" />
    <link type="text/css" rel="stylesheet" href="onepage-scroll.css" />
    <title>Ratinator - Вернем власть людям</title>
</head>
<body>


<div class="main" style="position: relative;">
    <section id="first" data-index="1">
        <div style="position: absolute;height: 500px; width: 500px;top: 50%; margin-top:-300px;left: 50%; margin-left: -250px">
        <header id="ratinatorLabel">R A T I N A T O R</header>
        <header id="newMachineDicedeLabel">Машины решают, что хорошо. Вернем власть людям.</header>
                <div id="formContainer">
                 <form name ="form1" method="post" action="index.php">
                      <div>
                           <div id="emailDiv">
                                <input id="email" value="" name="email" placeholder="Your@mail.com">
                           </div>
                                <input id="submitButton" type= "Submit" Name = "Submit1" VALUE = "Подписаться">
                                <p><span id="valid"></span></p>
                      </div>
                </form>
            </div>
            </div>
        <div class="scrollDown">
            <span id="scrollDown">Скроль вниз</span>
        </div>

        </section>
    <section id="third" data-index="2">


        <h1 id="secondScreenHeader">Представь, как изменится твой опыт серфинга, когда..</h1>

<div id="divHelper" style="position: absolute;height: 100%; width: 100%" ></div>


        <div id="clickResultPopup"
             style="display: none;
             position: absolute;
             left:100%;
             top: 100%;
             width: 350px;
             margin-left: -465px;
             background-color: #63c9be;
             background-repeat: no-repeat;
             padding: 5px;
             -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
             ">
            <div style="
             width: 12px;
             height: 20px;
             background-image: url(newImg/greenArrow.png);
             position: absolute;
             top: 50%;
             margin-top: -10px;
             left: 100%;"></div>
            <span id="popupText" style="text-align: center; font-size: 50px; font-family: helvetica"></span>
        </div>
        <div id="buttonsDescriptionContainer">
            <h1 id="buttonsDescription">У тебя на каждой странице есть такие кнопки</h1>
            <img style="position: absolute; margin-top: 10px; margin-left: 20px;" src="newImg/arrow.png"/>
        </div>
        <div id="likeButtonsContainer">
            <div id="rockDivWrapper">
                    <img id="rockButton" src="newImg/staticRockButton.png"/>
            </div>
            <div id="likeDivWrapper">
                    <div id="likeCount"></div>
                    <img id="likeButton" src="newImg/staticLikeButton.png">
             </div>
            <div id="dislikeDivWrapper">
                <img id="dislikeButton" src="newImg/staticDislikeButton.png">
                <div id="dislikeCount"></div>
            </div>
        </div>
        <div class="scrollDown">
        </div>
        <div class="scrollUp">
        </div>
    </section>
<section id="fourth" data-index="3">

    <div style="position: absolute;height: 500px; width: 500px;top: 50%; margin-top:-300px;left: 50%; margin-left: -250px">

    <header id="ratinatorSecondLabel">R A T I N A T O R</header>
    <header id="newMachineDicedeSecondLabel">Машины решают, что хорошо. Вернем власть людям.</header>
         <div id="secondFormContainer">
            <form name ="form2" method="post" action="index.php">
                <div>
                    <div id="emailDivSecond">
                        <input id="emailSecond" value="" name="email" placeholder="Your@mail.com">
                    </div>
                    <input id="submitButtonSecond" type= "Submit" Name = "Submit1" VALUE = "Подписаться">
                    <p><span id="validSecond"></span></p>
                </div>
            </form>
        </div>
        <div id="socialButtonsDiv">
            <script type="text/javascript">(function() {
                    if (window.pluso)if (typeof window.pluso.start == "function") return;
                    if (window.ifpluso==undefined) { window.ifpluso = 1;
                        var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                        s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                        s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                        var h=d[g]('body')[0];
                        h.appendChild(s);
                    }})();</script>
            <div class="pluso" data-background="transparent" data-options="big,round,line,horizontal,counter,theme=04" data-services="vkontakte,facebook,twitter"></div>
            <img id="whiteLine" src="newImg/whiteLine.png"/>
            <header id="shareTextStyle">Поделиться</header>
        </div>
    </div>

    <a id="bottomEmail" href="mailto:alex.stepanov@me.com">Написать нам</a>
    <div class="scrollUp">
    </div>
   </section>
</div>
</body>
</html>



