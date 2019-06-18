<?php
/**
 * Created by PhpStorm.
 * User: Mathias
 * Date: 16/06/2019
 * Time: 17:56
 */

include_once "models/db.php";

$db = new db();
$result = $db->getPostById($_GET['id']);
$result2 = $db->getUsersData();

include_once "templates/header.php";
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="new.php">New message</a>
                </li>
            </ul>
        </div>
    </nav>

    <form action="edit_handler.php" method="post">
        <input type="hidden" value="<?php echo $result[0]['post_id']?>" name="post_id">
        <div class="form-group">
            <label for="username">Username</label>
            <select class="form-control" id="username" name="username">
                <?php foreach($result2 as $row) : ?>
                    <option value="<?php echo $row['user_id'];?>" <?php if ( $row['user_id']===$result[0]['user_id']){echo "selected";}else{echo"disabled";} ?>>
                        <?php echo $row['username']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo $result[0]['title']?>">
        </div>
        <div class="form-group">
            <label for="body">Post</label>
            <input type="text" class="form-control" id="body" name="body" placeholder="Post" value="<?php echo $result[0]['body']?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php
include_once "templates/footer.php";