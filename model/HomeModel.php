<?php

class HomeModel {
    public $db;

    public function CheckUserLogin($username, $password) {
        $query = "SELECT count(*) FROM tbl_user WHERE username= :username AND password= :password";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        $user = $stmt->execute();

        return $user;
    }

    public function UserRegistration($username, $password) {
        $query = "INSERT INTO tbl_user (username, password) VALUES (:username, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':username', $username); 
        $stmt->bindValue(':password', $password); 
        $stmt->execute();

        // $query = "INSERT INTO tbl_user (username, password) VALUES ('".$username."', '".$password."')";
        // $stmt= $this->db->query($query);
        return 1;
    }
}