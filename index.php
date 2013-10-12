<!DOCTYPE html>
<meta charset="UTF-8" xmlns="http://www.w3.org/1999/html"/>

<html>
<head>
    <script type="text/javascript" src="scripts/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/scripts/main.js"></script>
    <script type="text/javascript" src="/jquery.onepage-scroll.js" ></script>
    <link type="text/css" rel="stylesheet" href="style.css" />
    <link type="text/css" rel="stylesheet" href="onepage-scroll.css" />
    <title>
        Landing
    </title>
</head>
<body>

<div id="backgroundContainer"></div>


<div class="main" style="position: relative;">


    <section id="first" data-index="1">
    <h2 id="machinesDecideLabel">MACHINES DECIDE WHAT IS GOOD</h2>
    <h2 id="returnPowerLabel">RETURN POWER TO THE HUMANS</h2>
        <?php

        if (isset( $_POST['email']) && $_POST['email'] != '')
        {
            echo "молодец!";
            $con=mysqli_connect("localhost","root","root","nogaDB");
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $sql="INSERT INTO Emails (Date, Email) VALUES (now(),'$_POST[email]')";
            if (!mysqli_query($con,$sql))
            {
                die('Error: ' . mysqli_error($con));
            }
            echo "1 record added";
            mysqli_close($con);
        }
        else
        {
            ?>
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

    <div id="socialButtonsFirst">
             <script type="text/javascript">(function() {
                                   if (window.pluso)if (typeof window.pluso.start == "function") return;
                                  if (window.ifpluso==undefined) { window.ifpluso = 1;
                                           var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                                           s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                                            s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                                           var h=d[g]('body')[0];
                                            h.appendChild(s);
                                        }})();</script>
                    <div class="pluso" data-background="transparent" data-options="medium,round,line,horizontal,counter,theme=04" data-services="vkontakte,facebook,twitter"></div>
                </div>

        <?php
        }
        ?>

    </section>
    <section id="second" data-index="2">
        <div id="secondLeftBlock">
            <h2>Проблема</h2>
            <p>Машины определяют, что хорошо.<br>  Попытки найти <br>лучшую информацию.<br>
            Вид сверху.</p>
            <div class="labyrinth">
                <div id="myDiv" style="background-image: url('img/man.png'); width: 8px; height: 21px; position: absolute;"></div>
            </div>

<!--            <img id="labyrinthLeft" src="/img/labyrinth.png" />-->

            <h1 id="slowCounter">0</h1>
        </div>
        <div id="secondRightBlock">
            <h2>Решение</h2>
            <p>Теперь можно<br> просто телепортироваться
                прямо на лучшую страницу.</p>
            <div class="labyrinth">
                <div id="myDivFast" style="background-image: url('img/man.png'); width: 8px; height: 21px; position: absolute;"></div>
            </div>

            <h1 id="fastCounter">0</h1>
        </div>

    </section>

    <section id="third" data-index="3">
        <h1 style="text-align: center; margin-top: 30px;">Представь, ты искал что-то в интернете, и перешел по одной из ссылок</h1>

        <div id="clickResultPopup" style="display: none; position: absolute;left:50%; top: 50%; background-color: white; padding: 5px">

        </div>

        <div id="buttonsDescriptionContainer">
            <img style="position: absolute; margin-left: -180px; margin-top: -40px;" src="/img/buttonsDescription.png" width="500px" />
            <img style="position: absolute; margin-top: 34px; margin-left: 20px;" src="/img/arrow.png"/>
        </div>

        <div id="likeButtonsContainer">
            <img id="likeButton" src="/img/like.png" />
            <img id="dislikeButton"  src="/img/dislike.png" />
        </div>
    </section>

<section id="fourth" data-index="4">
    <div id="subscribeDiv">
        <h3 id=textHeaderStyle>Подпишись</h3>
        <h3 id="textStyle">
            И первым узнаешь об изменении философии поиска
            И первым узнаешь об изменении философии поиска
            И первым узнаешь об изменении философии поиска
            И первым узнаешь об изменении философии поиска
            И первым узнаешь об изменении философии поиска
            И первым узнаешь об изменении философии поиска
        </h3>
    </div>
    <?php
    if (isset( $_POST['emailSecond']) && $_POST['emailSecond'] != '')
    {
        echo "молодец!";
        $con=mysqli_connect("localhost","root","root","nogaDB");
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $sql="INSERT INTO Emails (Date, Email) VALUES (now(),'$_POST[emailSecond]')";
        if (!mysqli_query($con,$sql))
        {
            die('Error: ' . mysqli_error($con));
        }
        echo "1 record added";
        mysqli_close($con);
    }
    else
    {
        ?>
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
    <?php
    }
    ?>
    <div id="socialButtonsSecond">
        <script type="text/javascript">(function() {
                if (window.pluso)if (typeof window.pluso.start == "function") return;
                if (window.ifpluso==undefined) { window.ifpluso = 1;
                    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                    var h=d[g]('body')[0];
                    h.appendChild(s);
                }})();</script>
        <div class="pluso" data-background="transparent" data-options="medium,round,line,horizontal,counter,theme=04" data-services="vkontakte,facebook,twitter"></div>
    </div>
</section>


</div>
</body>
</html>



