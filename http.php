<?php
function redirect($url)
{
  if (!headers_sent())
  {
    header('Location: http://' . $_SERVER['HTTP_HOST'] .
           dirname($_SERVER['PHP_SELF']) . '/' . $url);
  }
  else
  {
    //die('Could not redirect; Headers already sent (output).');
     die('<script type="text/javascript">
     window.location = "' . $url . '";
     </script>
     Redirecting you to the next page. Please wait for your browser to load the next page, or <a href="' . $url . '">Click Here</a> to continue');
  }
}
?>
