<?php
if (isset( $_GET['email']) && $_GET['email'] != '')
{
    $con=mysqli_connect("localhost","root","root","nogaDB");
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