<?php

class User
{

    static public function getRoleByUsername($username)
    {
        try {
            $query = "SELECT role FROM users WHERE username = :username LIMIT 0, 25;";
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":username" => $username));
            $user = $stmt->fetch(PDO::FETCH_OBJ);

            if ($user) {
                return $user->role;
            }

            $query = "SELECT role FROM admin WHERE username = :username LIMIT 0, 25;";
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":username" => $username));
            $admin = $stmt->fetch(PDO::FETCH_OBJ);

            if ($admin) {
                return $admin->role;
            }
        } catch (PDOException $ex) {
            echo "error : " . $ex->getMessage();
        }
    }



    static public function login($data, $role)
    {
        $username = $data["username"];
        try {
            $table = ($role === "admin") ? "admin" : "users";
            $query = "SELECT * FROM $table WHERE username = :username";
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":username" => $username));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
        } catch (PDOException $ex) {
            echo "error : " . $ex->getMessage();
        }
    }

    static public function createUser($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO users (fullname, username, ville, ntele, email, password, role)
        VALUES (:fullname, :username, :ville, :ntele, :email, :password, :role)');
        $stmt->bindParam(':fullname', $data['fullname']);
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':ville', $data['ville']);
        $stmt->bindParam(':ntele', $data['ntele']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':role', $data['role']);
        $stmt->bindParam(':password', $data['password']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
}
