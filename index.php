<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EnGauge</title>
        <link href="sliderformat.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" />
    </head>
    
    <body>
        <?php
        session_start();
        file_put_contents("log.html", '');

        if(isset($_GET['logout'])){    
        
            session_destroy();
            header("Location: index.php"); //Redirect the user
        }
        ?>
        <div id="wrapper" text-alignment=right;>
            <div id="menu">
                <p class="welcome">Welcome</b></p>
                <p class="logout"><a id="exit" href="#">New Class</a></p>
            </div>
 
            <div id="chatbox">
            <?php
            if(file_exists("log.html") && filesize("log.html") > 0){
                $contents = file_get_contents("log.html");          
                echo $contents;
            }
            ?>
            </div>


 
            <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" />
                <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
            </form>
        </div>
        <div class="container">
        <form action="" id="contactForm">
            <div class="alert">Your message sent</div>

            <div class="inputBox">
                <div id="slider">
                    <input type="range" min="0" max="100" value="50" id="name">
                    <p>Value:<span id="bar"></span></p>
                </div>  
                <!-- <input type="text" id="name" placeholder="Your name...." /> -->
            </div>

            <!-- <div class="inputBox">
                <input type="email" id="emailid" placeholder="Your Email....." />
            </div>

            <div class="inputBox">
                <textarea id="msgContent" cols="30" rows="10" placeholder="Message"></textarea>
            </div> -->

            <div class="inputBox">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/7.14.1-0/firebase.js"></script>
    <script src="firebase_script.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            // jQuery Document
            $(document).ready(function () {
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
 
                $("#exit").click(function () {
                    var exit = confirm("Are you sure you want to end the session?");
                    if (exit == true) {
                    window.location = "index.php?logout=true";
                    }
                });
            });
        </script>
    </body>
</html>