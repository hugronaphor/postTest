<?php

/**
 * @file
 */

/**
 * Post Controller.
 *
 * @author cornel
 */
class PostController {

  /**
   * Define an array of what fields are expected.
   *
   * @todo  Specify what we are expecting from each value as validation.
   *        However this needs to go as a separate Class, in this case we don't
   *        have time for this.
   */
  private $requiredInputs = [
    'title',
    'body',
    'user',
  ];

  /**
   * Store the values.
   */
  private $values;

  /**
   * Limit the data for current role.
   */
  private $role = 1;

  /**
   * Get the post for index page.
   *
   * @return array $rows
   *    Fetched records from DB.
   */
  public function index() {

    // Use $this->role
    // Fetch the posts from database.
    $role = $this->role;
    $res = mysql_query("SELECT * FROM post p
      INNER JOIN user u ON p.user=u.uid
      INNER JOIN role r ON u.uid=r.rid
      WHERE r.rid=$role
      ORDER BY created;");

    while ($row = mysql_fetch_assoc($res)) {
      $rows[] = $row;
    }

    return !empty($rows) ? $rows : [];
  }

  /**
   * Add a post into DB.
   */
  public function add() {
    $this->getFormValues();

    if (count($this->values) != count($this->requiredInputs)) {
      throw new Exception('All the fields are required.');
    }

    $title = $this->values['title'];
    $body = $this->values['body'];
    $user = $this->values['user'];
    // not sure if her is a reason for mysql_real_escape_string.
    // mysql_real_escape_string($unescaped_string);
    $inssql = "INSERT INTO post(title, body, created, user) VALUES('$title', '$body', UNIX_TIMESTAMP(), '$user');";
    if (mysql_query($inssql)) {
      return "The Post '$title' was added successfully!";
    }
    else {
      throw new Exception('Error adding new record.<br/>' . mysql_error());
    }
  }

  /**
   * Validate* and push the inputs.
   */
  private function getFormValues() {
    foreach ($this->requiredInputs as $name) {

      $val = strip_tags(filter_input(
          INPUT_POST, $name, FILTER_SANITIZE_SPECIAL_CHARS
      ));

      // Make sure the value is not empty.
      if (!empty($val)) {
        $this->values[$name] = $val;
      }
    }
  }

}
