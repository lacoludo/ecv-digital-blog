<?php

function post($title,$content,$posted){

    global $db;

    $p = [
        'title'     =>  $title,
        'content'   =>  $content,
        'writer'    =>  $_SESSION['admins'],
        'posted'    =>  $posted

    ];

    $sql = "
      INSERT INTO posts(title,content,writer,date,posted)
      VALUES(:title,:content,:writer,NOW(),:posted)
    ";

    $req = $db->prepare($sql);
    $req->execute($p);

}

function post_img($tmp_name, $extension){
    global $db;
    $id = $db->lastInsertId();
    $i = [
        'id'    => $id,
        'image' =>  $id.$extension
    ];

    $sql = "UPDATE posts SET image = :image WHERE id = :id";

    $req = $db->prepare($sql);
    $req->execute($i);
    move_uploaded_file($tmp_name, "../img/posts/".$id.$extension);
    echo"<script>window.location.replace(\"index.php?page=post&id=$id\");</script>";
}