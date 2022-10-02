<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>EnGauge</title>
        <link href="sliderformat.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" />
    </head>
    
    <body>
        <?php
        session_start();
        file_put_contents("slide.html", '');
        ?>
        <div id="wrapper">
            <div id="chatbox">
            <?php
            if(file_exists("slide.html") && filesize("slide.html") > 0){
                $contents = file_get_contents("slide.html");          
                echo $contents;
            }
            ?>
            </div>

        </div>
        <div id="slider">
                <input type="range" min="0" max="100" value="50" id="bar">
                <p>Value:<span id="value"></span></p>
        </div>             
        <div id="Submit">
                <input type="submit" value="Submit" id="icon">
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="slider.js"></script>
        <script type="text/javascript">
            // jQuery Document
            $(document).ready(function () {
                $("#submit").click(function () {
                    var clientmsg = $output.val();
                    $.post("slider.php", { slideval: clientmsg });
                    $("#usermsg").val("");
                    return false;
                });
 
                function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request
 
                    $.ajax({
                        url: "slide.html",
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