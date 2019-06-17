<?php
/**
 * Created by PhpStorm.
 * User: Mathias
 * Date: 17/06/2019
 * Time: 11:21
 */
include_once "models/db.php";

if (isset($_POST['title'])){
    $db = new db();
    $db->createPost($_POST['username'],$_POST['title'],$_POST['body']);
}else{
    header("Location: new.php?error=notitle");
}
header("Location: index.php");