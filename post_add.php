<?php
// Handle the POST request.
require_once 'app/routes.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add new Post</title>
    <link type="text/css" rel="stylesheet" href="/assets/css/base.css" media="all" />
  </head>
  <body>

    <div id="main-wrapp">
      <header>
        <div class="logo"><a href="/">The Social Network</a></div>
        <div class="user-data">
          <p>Welcome USER!</p>
          <a href="/post_add.php">Add new post</a>
        </div>
      </header>

      <div class="main-container post-form">
        <h1 class="page-title">Add new Post</h1>
        <form name="postadd" method="POST" action="">
          <label>Title</label>
          <div>
            <input name="title" type="text">
          </div>

          <label>Body</label>
          <div>
            <textarea name="body"></textarea>
          </div>

          <label>User(hard coded)</label>
          <div>
            <select name="user">
              <option>1</option>
              <option>2</option>
            </select>
          </div>

          <input type="submit" value="Submit" name="postAdd"><br>
        </form>
      </div>
    </div>



  </body>
</html>