<?php

/**
 * @file
 * The file for table cration and seeding.
 */
class dbMigrate {

  /**
   * Call the actions.
   */
  function __construct() {
    // Create the database.
    # ...
    // Create tables.
    $this->createPostTable();
    $this->createUserTable();
    $this->createRoleTable();

    // Populate Database.
    $this->seedRoleTable();
    $this->seedUserTable();
    $this->seedPostTable();
  }

  private function createPostTable() {

    $query = "CREATE TABLE IF NOT EXISTS post (
      pid int(11) NOT NULL auto_increment,
      title TEXT,
      body LONGTEXT,
      created VARCHAR(32),
      user INT(12),
      primary KEY (pid))";
    $result = mysql_query($query);

    if (!$result) {
      die('test failed 1');
    }
  }

  private function seedPostTable() {
    // Make sure there are nor records.
    $queryUserCheck = "SELECT * from post;";
    $userResult = mysql_query($queryUserCheck);
    $rows = mysql_fetch_array($userResult);

    if ($rows) {
      return;
    }

    $query = "INSERT INTO post(title, body, created, user) VALUES('Test Title 1', 'Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Pellentesque ut neque.', UNIX_TIMESTAMP(), '1');";
    $result = mysql_query($query);
    if (!$result) {
      die('test failed 6');
    }
  }

  /**
   * todo
   */
  private function createUserTable() {
    $query = "CREATE TABLE IF NOT EXISTS user (
      uid int(11) NOT NULL auto_increment,
      name TEXT,
      role INT(12),
      primary KEY (uid));";

    $result = mysql_query($query);
    if (!$result) {
      die('test failed 2');
    }
  }

  private function seedUserTable() {
    // Make sure there are nor records.
    $queryUserCheck = "SELECT * from user;";
    $userResult = mysql_query($queryUserCheck);
    $rows = mysql_fetch_array($userResult);

    if ($rows) {
      return;
    }

    foreach ([1 => 'User 1', 2 => 'User 2'] as $roleId => $userName) {
      $query = "INSERT INTO user(name, role) VALUES('$userName', '$roleId');";
      $result = mysql_query($query);
      if (!$result) {
        die('test failed 5');
      }
    }
  }

  private function createRoleTable() {
    $query = "CREATE TABLE IF NOT EXISTS role (
      rid int(11) NOT NULL auto_increment,
      role_name VARCHAR(255),
      primary KEY (rid));";

    $result = mysql_query($query);
    if (!$result) {
      die('test failed 3');
    }
  }

  private function seedRoleTable() {

    // Make sure there are nor records.
    $queryRoleCheck = "SELECT * from role;";
    $roleResult = mysql_query($queryRoleCheck);
    $rows = mysql_fetch_array($roleResult);

    if ($rows) {
      return;
    }

    foreach (['Role A', 'Role B'] as $roleName) {
      $query = "INSERT INTO role(role_name) VALUES('$roleName');";
      $result = mysql_query($query);
      if (!$result) {
        die('test failed 4');
      }
    }
  }

}
