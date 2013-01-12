<?php
session_start();
define("NONE", 0);
ini_set('include_path', 'http://localhost:8080/My%20PHP%20Work/luvlaf/');

require_once("conn.php");
require_once("http.php");

$dir = "/My%20PHP%20Work/luvlaf/";
$script = array();
$style = array();

function start_web($title_name, $j_scripts=NONE, $stylesheets=NONE, $s_header=false)
{
  global $dir;
  
  $title = $title_name;
  $styles = $stylesheets;
  $scripts = $j_scripts;
  $small_header = $s_header;

  require_once("header.php");
  require_once("date.php");
  
  echo "\n";
}

function end_web()
{
  global $dir;

  require_once("footer.php");
}
?>