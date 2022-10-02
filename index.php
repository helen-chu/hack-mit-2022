<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>EnGauge</title>
        <style>
			* {
				margin: 0;
				padding: 0;
        	}
			body{
				background: #111;
				font-family:sans-serif;
			}
			.main{
				width: 60%;
				margin:50% auto;
				position: relative;
			}
			#slider{
				-webkit-appearance:none;
				width:100%;
				height:20px;
				background: linear-gradient(-90deg,green,yellow,red);
				outline:none;
				border-radius:3px;
			}
			#slider::-webkit-slider-thumb{
				-webkit-appearance:none;
				width:48px;
				height:48px;
				cursor:point;
				z-index:3;
				position:relative;
			}
			#selector{
				height:104px;
				width:48px;
				position:absolute;
				bottom:-10px;
				left:50%;
				transform:translateX(-50%);
				z-index:2;
			}
			.SelectBtn{
				height:48px;
				width:48px;
				background-image:url(icon.png);
				background-size:cover;
				background-position:center;
				border-radius:50%;
				position:absolute;
				bottom:0;
			}
			#SelectValue{
				width:48px;
				height:40px;
				position:absolute;
				top:0;
				background:#23dafc;
				border-radius:4px;
				text-align:center;
				line-height:45px;
				font-size:20px;
				font-weight:bold;
			}
			#SelectValue::after{
				content:'';
				border-top:17px solid #23dafc;
				border-left:24px solid#000;
				border-right:24px solid#000;
				position:absolute;
				bottom:-14px;
				left:0;
			}
			#progressBar{
				width:0;
				height:20px;
				background:#111;
				border-radius:3px;
				position: absolute;
				top:0;
				left:100%;
			}
		</style>
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
        <div id="wrapper">
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
        <div class ="main">
		<input name="sliderval" type="range" min="0" max="100" value="50" id="slider">
        </div>
        <!-- <div>
            <input name="submitval" type="submit" id="submitval" value="Send" />
        </div> -->
		<div id="selector">
			<div class="SelectBtn"></div>
			<div id="SelectValue"></div>
		</div>

        <div id="slidePlot">
        <?php
            if(file_exists("status.html") && filesize("status.html") > 0){
                $contents = file_get_contents("status.html");          
                echo $contents;
            }
            ?>
        </div>

            <!-- script to take in status bar input -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<div id="progressBar"></div>
		<script>
			var slider = document.getElementById("slider");
			var selector = document.getElementById("selector");
			var SelectValue = document.getElementById("SelectValue");
			var progressBar = document.getElementById("progressBar");

			SelectValue.innerHTML = slider.value;

			slider.oninput = function(){
				SelectValue.innerHTML = this.value;
				selector.style.left = this.value + "%";
				progressBar.style.width = (-this.value) + "%";
            }

                // jQuery Document
            $(document).ready(function () {
                $("#sliderval").click(function () {
                    var slideval = $("#sliderval").val();
                    $.post("slide.php", { slideval: slideval });
                    $("#sliderval").val("");
                    return false;
                });
 
            //     function loadSlide() {
            //         var oldscrollHeight = $("#slidePlot")[0].scrollHeight - 20; //Scroll height before the request
 
            //         $.ajax({
            //             url: "status.html",
            //             cache: false,
            //             success: function (html) {
            //                 $("#slidePlot").html(html); //Insert slideplot log into the #slideplot div
 
            //                 //Auto-scroll           
            //                 var newscrollHeight = $("#slidePlot")[0].scrollHeight - 20; //Scroll height after the request
            //                 if(newscrollHeight > oldscrollHeight){
            //                     $("#slidePlot").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
            //                 }   
            //             }
            //         });
            //     }

            //     setInterval (loadSlide, 2500);
			}
		</script>
	
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