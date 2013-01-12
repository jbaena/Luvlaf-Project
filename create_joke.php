<?php
session_start();
require_once("http.php");
require_once("conn.php");

if($_POST['response_1'] != "" &&
   $_POST['response_2'] != "")
{
  $sql = "INSERT INTO knock_knock_jokes (response_1, response_2) VALUES
          ('" . $_POST['response_1'] . "', '" . $_POST['response_2'] . "')";
  $results = mysql_query($sql);
  
  // The Joke was Successfully added into the joke database
  if($results)
  {
    redirect("add_joke.php?success=");
  }
  else
  {
    // Could not add record because a duplicate joke was found
    if(mysql_errno() == "1022")
    {
      redirect("add_joke.php?err=2");
    }
    
    // Unknown Error Occurred
    else
    {
      redirect("add_joke.php?err=0");
    }
  }
}

// A Response is missing from the form
else
{
  redirect("add_joke.php?err=1");
}
?>