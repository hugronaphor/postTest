<?php
// Connect to the DB.
require_once 'app/db/doConnection.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>The social network</title>
    <link type="text/css" rel="stylesheet" href="/assets/css/base.css" media="all" />
  </head>
  <body>
    <?php
    // Include the PostController
    require_once 'app/controllers/PostController.php';

    // Get the posts for current user based on the role.
    $post = new PostController();
    $results = $post->index();
    ?>

    <div id="main-wrapp">
      <header>
        <div class="logo"><a href="/">The Social Network</a></div>
        <div class="user-data">
          <p>Welcome USER!</p>
          <a href="/post_add.php">Add new post</a>
        </div>
      </header>

      <div class="main-container">
        <?php if (empty($results)) : ?>
          <p class="error"><?php print 'No Result Found!'; ?></p>
        <?php endif; ?>

        <?php foreach ($results as $result): ?>
          <article>
            <h1 class="title"><?php print $result['title']; ?></h1>
            <div class="body"><?php print $result['body']; ?></div>
            <div class="body"><?php print $result['body']; ?></div>
            <div class="meta-data">
              <span class="author">By <?php print $result['name']; ?>, with <?php print $result['role_name']; ?></span>
              <span></span>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>





  </body>
</html>
