<!DOCTYPE html>
<meta charset="UTF-8" />

<html>
<head>
    <script type="text/javascript" src="scripts/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/scripts/main.js"></script>

    <link type="text/css" rel="stylesheet" href="style.css" />

    <title>
        Landing
    </title>
</head>
<body>
<div id="first">

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
</div>
<div id="second">
    <div id="secondLeftBlock">
        <h2>Раньше</h2>
        <p>Учитесь на чужих ошибках, пацанчики.
            This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
            Aenean sollicitudin lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id
            elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
        <img id="labyrinthLeft" src="/img/labyrinth.png" />
        <h1>03:15</h1>
    </div>
    <div id="secondRightBlock">
        <h2>Теперь</h2>
        <p>Учитесь на чужих ошибках, пацанчики.
            This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
            Aenean sollicitudin lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id
            elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
        <img id="labyrinthRight" src="/img/labyrinth.png" />
        <h1>00:01</h1>
    </div>
    <div id="third">
        <div id="lapTopContainer">
            <img src="img/lapTop.png">
        </div>
        <div id="howItWorksContainer">
            <h3 id=textHeaderStyle>
                Как работает
            </h3>
            <h3 id="textStyle">
                Учитесь на чужих ошибках и тд...
            </h3>
        </div>
    </div>
    <div id="fourth">
        <div>

        </div>
    </div>
</div>
</body>
</html>



