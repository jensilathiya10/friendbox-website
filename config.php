<?php
    $conn = mysqli_connect("localhost","root","","friendbox");

    if(!$conn){
        echo "conncetion failed";
    }else{
        error_reporting(E_ERROR | E_PARSE);
    }
?>