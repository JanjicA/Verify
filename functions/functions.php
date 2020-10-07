<?php

    function changeUser($id, $isActive){

        global $conn;
        $query = $conn->prepare("UPDATE users SET isActive = ? WHERE id = ?");
        $users = $query->execute([$isActive, $id]);
        return $users;
    }

    function changeUserParameter($id, $email, $username){

        global $conn;
        $query = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
        $user = $query->execute([$username, $email, $id]);
        return $user;
    }

    function deleteUser($id){

        global $conn;
        $query = $conn->prepare("DELETE FROM users WHERE id = ?");
        $query->execute([$id]);
        return $query;
    }

    function changePassword($id, $newpass){

        global $conn;
        $query = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $users = $query->execute([$newpass, $id]);
        return $users;
    }

    function verify($vkey){

        global $conn;
        $query = $conn->prepare("UPDATE users SET isActive = 1 WHERE vkey = ?");
        $veryifi = $query->execute([$vkey]);
        return $veryifi;
    }