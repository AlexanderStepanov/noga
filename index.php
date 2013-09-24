<!DOCTYPE html>
<meta charset="UTF-8" />

<html>
<head>
    <script type="text/javascript" src="jquery-2.0.3.min.js"></script>

    <title>
        Noga Landing
    </title>

    <style>
        * {margin: 0; padding: 0;}

        body{
            margin: 0;
            padding: 0;
            height: 100%;
        }

        html {
            margin: 0; padding: 0;
        }

        ::-webkit-input-placeholder { /* WebKit browsers */
            color:    white;
            opacity: 0.7 !important;
        }

        #valid{
            position: absolute;
            margin-top: 50px;
            margin-left: 30px;
            color: white;
        }

        #first{
            margin: 0;
            margin-top: 0px;
            height: 100%;
            width: 100%;
            position: absolute;
            min-height: 100%;
            background-image: url("/img/backgroud.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        #second{
            height: 100%;
            width: 100%;
            position: absolute;
            min-height: 100%;
            top: 100%;
            background-color: white;
        }
        
        #emailDiv{
            background-image: url("/img/inputRoundedBackground.png");
            padding-top: 10px;
            padding-left: 9px;
            display: inline-block;
            background-repeat: no-repeat;
            width:  335px;
            height: 43px;
            position: absolute;
        }
        
        #email{
            background-color: transparent;
            color: white;
            font-size: 15pt;
            border: none;
            width: 320px;
            height: 25px;
        }

        #email:focus{
            outline: 0;
        }

        #formContainer{
            left: 50%;
            top: 50%;
            position: absolute;
            width: 500px;
            height: 80px;
            margin-left: -250px;
            margin-top: -40px;
        }

        #submitButton{
            color: #5dc6a5;
            font-size: 11pt;
            background-image: url("/img/roundedButton.png");
            width: 135px;
            height: 43px;
            border: none;
            background-color: transparent;
            position: absolute;
            left: 350px;
        }
    </style>

    <script type="text/javascript">
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
        });
    </script>
</head>
<body>
    <div id="first">

    <?php

    if (isset( $_POST['email']) && $_POST['email'] != '')
    {

    echo "molodets!";

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



