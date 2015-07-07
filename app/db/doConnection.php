<?php

// @todo: Use PDO query if there is going to be enough time.

require_once 'app/db/dbConnect.php';

// Connect to the mysql.
$dbConnection = new dbConnect('localhost', 'root', 'gfhjkm', 'fb');

// Create all the needed tables, if required.
if (1) {
  require_once 'app/db/dbMigrate.php';
  $created = new dbMigrate();
}