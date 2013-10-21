<?php
if (isset( $_GET['email']) && $_GET['email'] != '')
{
    $con=mysqli_connect("mysql.hostinger.com.ua","u176334619_root","qwertyui123","u176334619_rate");
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql="INSERT INTO Emails (Date, Email) VALUES (now(),'$_GET[email]')";
    if (!mysqli_query($con,$sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    mysqli_close($con);
}
?>