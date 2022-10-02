<?
session_start();
if(isset($_SESSION['name'])){
    $text = $_POST['text'];
     
    $text_message = "<div class='msgln'><span class='chat-time'>".date("g:i A")."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";
     
    file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
}
?>