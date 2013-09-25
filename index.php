<!DOCTYPE html>
<meta charset="UTF-8" />

<html>
<head>
    <script type="text/javascript" src="jquery-2.0.3.min.js"></script>
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
        <img src="/img/labyrinth.png" />
    </div>
</body>
</html>



