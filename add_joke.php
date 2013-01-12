<?php
require_once('web_essentials.php');
start_web("Add New Joke", $script, $style);
?>

<h1>New Knock-Knock Joke</h1>

<?php 
if(isset($_GET['err']))
{
  echo "<div class='error'>";
  
  switch($_GET['err'])
  {
    case "0":
      echo "An Unknown Error occurred. Could not resolve the issue.";
      break;

    case "1":
      echo "A Response was missing from the form.";
      break;

    case "2":
      echo "Duplicate knock knock joke detected.";
      break;
  }
  
  echo "</div>";
}

if(isset($_GET['success']))
{
  echo "<div class='success'>Knock knock joke added successfully!</div>";
}
?>

<form id='joke_form' class='formTable' method='POST' action='create_joke.php'>
  <p>
    <label class='required'>Response 1</label>
    <input id='response_1' name='response_1' class='textfield' type='text' maxlength='50'>
  </p>
  
  <p>
    <label class='required'>Response 2</label>
    <input id='response_2' name='response_2' class='textfield' type='text' maxlength='50'>
  </p>
  
  <input type='submit' class='button' value='Submit'>
</form>

<?php end_web(); ?>