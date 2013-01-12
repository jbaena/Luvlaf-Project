<?php
require_once('web_essentials.php');
$style[] = "style/page_style/home.css";
start_web("Home", $script, $style);
?>

<script type='text/javascript'>
$(function(){
  var jokeDisplay = $("#joke_display");
  var jokeResponder = $("<div class='button'>OK!</div>");
  var jokeStage = 0;
  
  var jokeID;
  var jsonResponse;
  
  var responses = ["Who's There?", 
                   "$ Who?", 
                   "That was funny <img src='images/icons/emoticon_grin.png'>, can you tell me another?"];
                   
  var errorMsg = ["Whoops, I can't seem to remember any at the moment, give me a moment...",
                   "Oh no I forgot, let me try again...", 
                   "Shoot, I forgot the punch line..."];
  
  var errorResponses = ["Can you try again?",
                        "OK",
                        "Aww that's lame. Try a different one."];
  
  jokeResponder.click(function(){
    requestStr = "type=knock_knock&stage=" + jokeStage + "&id=" + jokeID;
    
    $.ajax({
      type: 'POST',
      url: "ajax/joke_request.php",
      data: requestStr,
      complete: function(data){
        //alert(jokeID);
        
        if(data.responseText != '-1')
        {
          jsonResponse = $.parseJSON(data.responseText);
          
          jokeDisplay.html(jsonResponse["response"]);
          jokeResponder.html(responses[jokeStage].replace("$", jsonResponse["response"]));
          jokeID = jsonResponse["id"];
          
          //alert(jokeID);
          
          jokeStage = (jokeStage + 1) % 3;
        }
        else
        {
          jokeDisplay.html(errorMsg[jokeStage]);
          jokeResponder.html(errorResponses[jokeStage]);
          
          jokeStage = 0;
        }
        
        requestStr = "type=knock_knock&stage=" + jokeStage + "&id=" + jokeID;
        //alert(requestStr);
      }
    });
  });
  
  $("#joke_responder").replaceWith(jokeResponder);
});
</script>

<form id='joke_form' method='POST' action='joke_response.php'>
  <div id='joke_display'>Would you like to hear a joke?</div>
  <div id='user_response'>
    <input id='joke_responder' type='button' class='button' value='OK!'>
  </div>
</form>

<?php end_web(); ?>