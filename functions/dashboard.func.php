<?php

function inTable($table){
    global $db;
    $query = $db->query("SELECT COUNT(id) FROM $table");
    return $nombre = $query->fetch();

}

function getcolor($table, $colors){
    if(isset($colors[$table])){
        return $colors[$table];

    }else{
        return "orange";
    }
}

function get_comments(){
    global $db;

    $req = $db->query("
        SELECT  comments.id,
                comments.name,
                comments.email,
                comments.date,
                comments.post_id,
                comments.comment,
                posts.title
        FROM comments
        JOIN posts
        ON comments.post_id = posts.id
        WHERE comments.seen = '0'
        ORDER BY comments.date ASC
    ");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;
}


function get_photo_profile(){
    global $db;

    $req = $db->query("SELECT name,photo FROM admins");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[]= $rows;

    }

    return $results;

}

function get_post_user(){
    global $db;

    $log = $_SESSION["admins"];
    $req = $db->query("
        SELECT posts.id,
                posts.title,
                posts.image,
                posts.date,
                posts.content,
                posts.posted,
                admins.name
        FROM posts
        JOIN admins
        ON posts.writer = admins.email
        WHERE posts.id = '{$_GET['id']}'
    ");

    $result = $req->fetchObject();
    return $result;
}