<?php

class UserController
{

    public function auth()
    {
        if (isset($_POST["submit"])) {
            $data["username"] = $_POST["username"];
            $role = User::getRoleByUsername($data["username"]);

            $user = User::login($data, $role);
            if ($user && $user->username === $_POST["username"] && password_verify($_POST["password"], $user->password)) {
                $_SESSION["logged"] = true;
                if ($role === 'user') {
                    $_SESSION["fullname"] = $user->fullname;
                    $_SESSION["role"] = 'user';
                } elseif ($role === 'admin') {
                    $_SESSION["admin"] = true;
                    $_SESSION["fullname"] = $user->fullname;
                    $_SESSION["role"] = 'user';
                }
                Redirect::to("home");
            } else {
                Session::set("error", "username ou mot de passe est incorrect");
                Redirect::to("login");
            }
        }
    }


    public function register()
    {
        $options = [
            "cost" => 12
        ];
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);
        $data = array(
            "fullname" => $_POST["fullname"],
            "username" => $_POST["username"],
            "ville" => $_POST["ville"],
            "ntele" => $_POST["ntele"],
            "email" => $_POST["email"],
            "password" => $password,
            "role" => "user", // default role is set to "user"
        );
        $result = User::createUser($data);
        if ($result === "ok") {
            Session::set("success", "Compte crée");
            Redirect::to("login");
        } else {
            echo $result;
        }
    }
    public function logout()
    {
        session_destroy();
    }
}
