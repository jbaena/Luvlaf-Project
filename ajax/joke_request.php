<?php
session_start();
require_once("../conn.php");

$jsonArr;

if($_POST['stage'] > 0)
{
  $sql = "SELECT response_" . $_POST['stage'] . " as response FROM knock_knock_jokes k
          WHERE id = '" . $_POST['id'] . "'";
  $results = mysql_query($sql);
  
  if($results)
  {
    $row = mysql_fetch_array($results, MYSQL_ASSOC);
    $jsonArr["response"] = $row["response"];
    $jsonArr["id"] = $_POST['id'];
    
    echo json_encode($jsonArr); 
  }
  else
  {
    echo "-1";
  }
}
else
{
  $sql = "SELECT floor(rand() * count(id)) + 1 as id FROM knock_knock_jokes k";
  $results = mysql_query($sql);
  
  if($results)
  {
    $row = mysql_fetch_array($results, MYSQL_ASSOC);
    $jsonArr["response"] = "Knock Knock!";
    $jsonArr["id"] = $row['id'];
  }
  else
  {
    echo "-1";
  }
  
  echo json_encode($jsonArr); 
}
?>