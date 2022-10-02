<?
session_start();

    $text = $_POST['text'];
     
    $text_message = stripslashes(htmlspecialchars($text))."<br></div>";
     
    file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);

?>