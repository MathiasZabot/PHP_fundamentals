<?php
/**
 * Created by PhpStorm.
 * User: Mathias
 * Date: 17/06/2019
 * Time: 11:21
 */
include_once "models/db.php";


    $date = date("d-m-y","h:m:s");
    $db = new db();
    $db->createPost($_POST['title'],$_POST['body'],$date,$_POST['username']);

header("Location: index.php");