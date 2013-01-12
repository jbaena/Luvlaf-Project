<?php
function formatDate($date, $format="showDate")
{
  if($format == "showDate" && $date != "")
  {
    $date = explode("-",$date);
    $year = $date[0];
    $month = $date[1];
    $day = substr($date[2], 0, 2);
    $extra = substr($date[2], 3);

    $result = $month . "/" . $day . "/" . $year;
    if($extra != "")
    {
      $result .= " " .  $extra;
    }
    return $result;
  }

  else if($format == "inputDate")
  {
    $date = explode("/",$date);
    $month = $date[0];
    $day = $date[1];
    $year = $date[2];
    $result =  $year . "-" . $month . "-" . $day;
    return ($result != "--" ? $result : "");
  }

  else if($format == "array")
  {
    $date = explode("-",$date);
    $year = $date[0];
    $month = $date[1];
    $day = substr($date[2], 0, 2);

    $result[] = $month;
    $result[] = $day;
    $result[] = $year;

    return $result;
  }
}

function getDateTime()
{
  return date("Y-m-d H:i:s");
}

function getAge($date)
{
  $result = "";

  $today[0] = date("Y");
  $today[1] = date("m");
  $today[2] = date("d");

  $dateArr = explode("-",$date);
  $year = $today[0] - $dateArr[0];
  $month = $today[1] - $dateArr[1];
  $day = $today[2] - substr($dateArr[2], 0, 2);

  if($year > 0)
  {
    $result = $year . " year";
    if($year > 1)
    {
      $result .= "s";
    }
  }
  else if($month > 0)
  {
    $result = $month . " month";
    if($month > 1)
    {
      $result .= "s";
    }
  }
  else if($day > 0)
  {
    $result = $day . " day";
    if($day > 1)
    {
      $result .= "s";
    }
    else
    {
      $result = "Yesterday";
    }
  }
  else
  {
    $result = "Today";
  }

  return $result;
}
?>
