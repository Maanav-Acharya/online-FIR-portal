<?php
session_start();
session_unset();
session_destroy();
echo "<script> alert('Email or password Invalid!') </script>";
header('Location:http://127.0.0.1:8012/project/home.php');
?>