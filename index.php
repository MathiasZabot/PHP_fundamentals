<?php
/**
 * Created by PhpStorm.
 * User: Mathias
 * Date: 16/06/2019
 * Time: 17:55
 */

include_once "models/db.php";
include_once "models/feed.php";

$db = new db();
$data = $db->getAllData("posts");
$feed = new feed($data);

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
    <div class="blog-main">
        <?php foreach($data as $row) : ?>
            <div class="blog-post">
                <h4 class="blog-post-title">
                    <?php echo $row['title']; ?>
                </h4>
                <p class="blog-post-meta">
                    <?php echo $row['create_date']; ?>
                </p>
                <p>
                    <?php echo $row['body']; ?>
                </p>
                <div class="blog-post-options">
                    <a class="btn btn-outline-secondary" href="edit.php?id=<?php echo $row['post_id']; ?>"  role="button">Edit</a>
                    <a class="btn btn-outline-secondary" href="delete.php?id=<?php echo $row['post_id']; ?>" role="button">Delete</a>
                </div>
            </div>



        <?php endforeach; ?>
    </div>
<?php
include_once "templates/footer.php";