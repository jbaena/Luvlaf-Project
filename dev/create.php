<?php
// connect to the database - either include a connection variable file or
// type the following lines:
$connect = mysql_connect("localhost", "root", "R!G@jce#") or
  die ("Hey loser, check your server connection.");

// Create the LuvLaf database
if (mysql_query("CREATE DATABASE luvlaf")) {
  echo "Woo hoo! Database created! <br>";
} else {
  echo "Sorry, try creating the database again.";
}
mysql_select_db("luvlaf");

// Create the tables that make up the database
$query = "CREATE TABLE IF NOT EXISTS knock_knock_jokes (
          id INT(10) NOT NULL AUTO_INCREMENT,
          response_1 VARCHAR(50) NOT NULL,
          response_2 VARCHAR(50) NOT NULL,
          PRIMARY KEY(id),
          UNIQUE KEY(response_1, response_2))";

mysql_query($query)
  or die(mysql_error());

// Create pre-defined jokes for the Knock-Knock Joke Table
$query = "INSERT INTO knock_knock_jokes (response_1, response_2) VALUES
          ('Banana', 'Banana Banana!'),
          ('Orange', 'Orange you glad I didn\'t say Banana!'),
          ('Wendy', 'Wendy wind blows, the craddle will rock'),
          ('Boo', 'Don\'t cry, it was only a knock knock joke.')";

mysql_query($query)
  or die(mysql_error());

echo "Tables created successfully.";