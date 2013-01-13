<!DOCTYPE html>
<head>
<title>Luflaf Project: <?php echo $title; ?></title>

<script type="text/javascript" src="<?php echo $dir; ?>script/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $dir; ?>script/jquery_ui/js/jquery_ui.js"></script>
<?php
if($scripts != NONE)
{
  foreach($scripts as $script)
  {
    echo "<script type='text/javascript' src='" . $dir . $script . "'></script>\n";
  }
}
?>

<link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>style/body.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>style/movable_class.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>script/jquery_ui/css/ui-lightness/jquery-ui-1.8.css">
<?php
if($styles != NONE)
{
  foreach($styles as $style)
  {
    echo "<link rel='stylesheet' type='text/css' href='" . $dir . $style . "'>\n";
  }
}
?>
</head>
<body>

<div id='wrapper' class='<?php echo ($small_header ? "small" : "") ; ?>'>
  <div id='main'>
    <div id='main_content'>
