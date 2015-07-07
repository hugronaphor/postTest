<?php

/**
 * @file
 * The file for DB Connection.
 */
class dbConnect {

  public $host;
  public $user;
  public $pass;
  public $db;
  public $link;

  /**
   * Handle the DB connection.
   *
   * @param string $h
   * @param string $u
   * @param string $p
   * @param string $d
   */
  function __construct($h, $u, $p, $d) {
    // Connect to the database.
    $this->connect($h, $u, $p, $d);
    // Select a name the database.
    $this->selectdb($this->link);
  }

  /**
   * Connect to the DB.
   *
   * @param string $host
   * @param string $user
   * @param string $pass
   * @param string $db
   * @return mixed
   */
  private function connect($host, $user, $pass, $db) {

    $this->host = $host;
    $this->user = $user;
    $this->pass = $pass;
    $this->db = $db;

    $this->link = mysql_connect($this->host, $this->user, $this->pass);
    if ($this->link == TRUE) {
      return $this->link;
    }
    else {
      return die($this->error());
    }
  }

  /**
   * Select the specified Database.
   * 
   * @param type $link
   * @return mixed
   */
  private function selectdb($link) {
    $this->sdb = mysql_select_db($this->db, $link);
    if ($this->sdb == true) {
      return $this->sdb;
    }
    else {
      return die($this->error());
    }
  }

  private function error() {
    return '<pre>' . mysql_error() . '</pre>';
  }

}
