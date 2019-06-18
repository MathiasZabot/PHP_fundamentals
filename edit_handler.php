<?php
/**
 * Created by PhpStorm.
 * User: Mathias
 * Date: 18/06/2019
 * Time: 10:45
 */

include_once "models/db.php";

$db = new db();
$db->updatePostById($_POST['post_id'],$_POST['title'],$_POST['body']);

header("Location: index.php");