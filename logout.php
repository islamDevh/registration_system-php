<?php
session_start(); 

session_unset();
//or
//unset($SESSION); 
session_destroy(); 
header("location:index.php");