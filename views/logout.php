<?php


$user = new UserController();
$user->logout();
Redirect::to("welcome");


// header("Location: http://localhost/ElectroMaroc/welcome");  
