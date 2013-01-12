<?php
  $conn = mysql_connect('localhost', 'jbaena', 'knuckles')
    or die('Could not connect to the database; ' . mysql_error());

  mysql_select_db('luvlaf', $conn)
    or die('Could not select database; ' . mysql_error());
?>