<?php

$db = mysqli_connect("localhost","root","","mtb");
if(mysqli_connect_errno())
{
    echo "Error connecting".mysqli_connect_error();
    die();
    
}else{

   // echo "Connecting";
}

?>