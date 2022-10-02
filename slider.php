<?
session_start();

    $slideval = $_POST['slideval'];
     
    $text_message = "<div class='msgln'><span class='chat-time'>".date("g:i A").stripslashes(htmlspecialchars($slideval))."<br></div>";
     
    file_put_contents("status.html", $text_message, FILE_APPEND | LOCK_EX);

?>