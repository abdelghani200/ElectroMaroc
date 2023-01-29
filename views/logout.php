<?php
$user = new UserController();
$user->logout();
Redirect::to("home");
