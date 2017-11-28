<?php

function new_member($name,$email,$password){
    global $db;

    $a = [
        'name' => $name,
        'email' => $email,
        'password' => sha1($password)
    ];

    $sql = "INSERT INTO admins(name,email,password) VALUES(:name,:email,:password)";
    $req = $db->prepare($sql);
    $req->execute($a);
}

function email_taken($email){
    global $db;

    $e = ['email' => $email];
    $sql = "SELECT * FROM admins WHERE email = :email";
    $req = $db->prepare($sql);
    $req->execute($e);
    $free = $req->rowCount($sql);

    return $free;
}

function post_img($tmp_name, $extension){
    global $db;
    $id = $db->lastInsertId();
    $i = [
        'id'    => $id,
        'photo' =>  $id.$extension
    ];

    $sql = "UPDATE admins SET photo = :photo";

    $req = $db->prepare($sql);
    $req->execute($i);
    move_uploaded_file($tmp_name, "img/".$id.$extension);
    echo"<script>window.location.replace(\"index.php?page=post&id=$id\");</script>";
}