<!doctype html>
<html>
  <head>
    <title>EnGauge</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
        <h1>EnGauge</h1><br>
    <h3> Current Messages:</h3>

    <div id="chatbox"><?php
<<<<<<< HEAD
=======
    session_start();
>>>>>>> 6a27b817a94ad41d9a8d4d52015173af0658bd33
        if(file_exists("log.html") && filesize("log.html") > 0){
            
            $contents = file_get_contents("log.html");         
            echo $contents;
        }
    ?></div>

    <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" />
                <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
            </form>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            // jQuery Document
            $(document).ready(function () {
              //If user submits the form
              $("#submitmsg").click(function () {
                  var clientmsg = $("#usermsg").val();
                  $.post("post.php", { text: clientmsg });
                  $("#usermsg").val("");
                  return false;
              });

              function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request
 
                    $.ajax({
                        url: "log.html",
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); //Insert chat log into the #chatbox div
 
                            //Auto-scroll           
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                            }   
                        }
                    });
                }
 
                setInterval (loadLog, 2500);
                
            });
        </script>
  </body>


</html>