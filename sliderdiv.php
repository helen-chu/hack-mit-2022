<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>EnGauge</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    
    <body>
        <?php
        session_start();
        file_put_contents("log.html", 'testtttttt');

        if(isset($_GET['logout'])){    
        
            session_destroy();
            header("Location: index.php"); //Redirect the user
        }
        ?>
        <div class ="main">
		<input name="sliderval" type="range" min="0" max="100" value="50" id="sliderval">
        </div>
        <!-- <div>
            <input name="submitval" type="submit" id="submitval" value="Send" />
        </div> -->
		<!-- <div id="selector">
			<div class="SelectBtn"></div>
			<div id="SelectValue"></div>
		</div> -->

        <div id="slidePlot">
                <p>test</p>
        <?php
            if(file_exists("status.html") && filesize("status.html") > 0){
                $contents = file_get_contents("status.html");          
                echo $contents;
            }
            ?>
        </div>

            <!-- script to take in status bar input -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
                var slider = document.getElementById("slider"); 
                var SelectValue = document.getElementById("SelectValue");
                SelectValue.innerHTML = slider.value;

                // jQuery Document
            $(document).ready(function () {
                $("#sliderval").click(function () {
                SelectValue.innerHTML = slider.value;
                    var inputslide = $("#sliderval").val();
                    $.post("slider.php", { slideval: SelectValue });
                    $("#sliderval").val("");
                    return false;
                });
 
                function loadSlide() {
                    var oldscrollHeight = $("#slidePlot")[0].scrollHeight - 20; //Scroll height before the request
 
                    $.ajax({
                        url: "status.html",
                        cache: false,
                        success: function (html) {
                            $("#slidePlot").html(html); //Insert slideplot log into the #slideplot div
 
                            //Auto-scroll           
                            var newscrollHeight = $("#slidePlot")[0].scrollHeight - 20; //Scroll height after the request
                            if(newscrollHeight > oldscrollHeight){
                                $("#slidePlot").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                            }   
                        }
                    });
                }

                setInterval (loadSlide, 2500);
			}
		</script>
    </body>
</html>