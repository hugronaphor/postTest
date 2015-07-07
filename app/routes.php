<?php

// Connect to the DB.
require_once 'app/db/doConnection.php';

// Include the PostController
require_once 'app/controllers/PostController.php';

if (isset($_POST['postAdd'])) {
  $post = new PostController();

  try {
    $result = $post->add();
    print $result;
  }
  catch (Exception $e) {
    print $e->getMessage();
  }
}