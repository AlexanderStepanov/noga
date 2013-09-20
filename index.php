<!DOCTYPE html>
<meta charset="UTF-8" />

<html>
<head>
    <script type="text/javascript" src="jquery-2.0.3.min.js"></script>

    <title>
        Noga Landing
    </title>

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
                    email.css({'border' : '1px solid #569b44'});
                    $('#valid').text('');
                }
                if(!isValid){
                    $(this).css({'border' : '1px solid #ff0000'});
                    $('#valid').text(errorText);
                }
            } else {
                isValid = false;
                email.css({'border' : '1px solid #ff0000'});
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

        <form name ="form1" method="post" action="index.php">
            <p>
                <input id="email" type="email" value="" name="email" required="required"><span id="valid"></span>
            </p>
            <p>
                <input id="submitButton" type= "Submit" Name = "Submit1" VALUE = "Podpisat`s`a">
            </p>
        </form>

    <?php
        echo "StringEmpty";
    }

    ?>

</body>
</html>



