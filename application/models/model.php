<?php
class model extends CI_Model
{
  public function __construct()
  {
    $this -> load -> database();
  }

  public function testing()
  {
    $test="does it work";

    return $test;
  }
}
?>
