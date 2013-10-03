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

    <?php
    }
    ?>

    <div id="socialButtons">
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
    <section id="second" data-index="2">
        <div id="secondLeftBlock">
            <h2>Проблема</h2>
            <p>Мы тратим тысячи часов<br>
                на поиск того, что уже найдено, проверено и оценено.</p>
            <img id="labyrinthLeft" src="/img/labyrinth.png" />
            <h1>03:15</h1>
        </div>
        <div id="secondRightBlock">
            <h2>Решение</h2>
            <p>Теперь можно<br> просто телепортироваться
                прямо на лучшую страницу.</p>
            <img id="labyrinthRight" src="/img/labyrinth.png" />
            <h1>00:01</h1>
        </div>

    </section>
    <section id="third" data-index="3">
        <div id="lapTopContainer">
            <img src="img/lapTop.png">
        </div>
        <div id="howItWorksContainer">
            <h3 id=textHeaderStyle>
                Как работает
            </h3>
            <h3 id="textStyle">
                На каждой странице в интернете размещаются кнопки Like Dislike.
                И чудо-кнопка Star, при нажатии на которую ты сразу попадаешь на
                лучшую страницу по этой тематике.
            </h3>
        </div>
    </section>
    <section id="fourth" data-index="4">
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
            <div id="subscribeDiv">
                <h3 id=textHeaderStyle>
                    Подпишись
                </h3>
                <h3 id="textStyle">
                    И первым узнаешь об изменении философии поиска
                    И первым узнаешь об изменении философии поиска
                    И первым узнаешь об изменении философии поиска
                    И первым узнаешь об изменении философии поиска
                    И первым узнаешь об изменении философии поиска
                    И первым узнаешь об изменении философии поиска
                </h3>
            </div>
        <div id="secondFormContainer">
            <form name ="form1" method="post" action="index.php">
                <div>
                    <div id="emailSecondDiv">
                        <input id="emailSecond" value="" name="email" placeholder="Your@mail.com">
                    </div>

                    <input id="submitButtonGreen" type= "Submit" Name = "Submit1" VALUE = "Подписаться">

                    <p><span id="valid"></span></p>
                </div>
            </form>
        </div>
        <?php
        }
        ?>
    </section>


</div>
</body>
</html>



