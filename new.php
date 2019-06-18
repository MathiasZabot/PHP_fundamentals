<?php
/**
 * Created by PhpStorm.
 * User: Mathias
 * Date: 16/06/2019
 * Time: 17:54
 */
include_once "models/db.php";

$db = new db();
$result = $db->getUsersData();

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

    <form action="new_handler.php" method="post">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="username">Username</label>
            </div>
            <select class="custom-select" id="username" name="username">
                <?php foreach($result as $row) : ?>
                    <option value="<?php echo $row['user_id'];?>">
                        <?php echo $row['username']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="body">Post</label>
            <textarea class="form-control" id="body" name="body" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php
include_once "templates/footer.php";