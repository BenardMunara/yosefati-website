<?php

session_start();
 
session_destroy();
mysqli_close($connect);

header('location:login.html');
 
?>