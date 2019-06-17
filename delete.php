<?php
/**
 * Created by PhpStorm.
 * User: Mathias
 * Date: 16/06/2019
 * Time: 17:56
 */

include_once "models/db.php";

$db = new db();
if(isset($_GET['id'])){
    $db->deleteDataById('posts',$_GET['id']);
}else {
    echo "No item was given to delete";
}
header("Location: index.php");