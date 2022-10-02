<!DOCTYPE html>
<html>
<body>

<h1>Place your question here</h1>

<!--
<form action="/action_page.php">
  <label for="fname">Question:</label>
  <input type="text" id="fname" name="fname"><br><br>
  <input type="submit" value="Submit">
</form>


    <p>Click the "Submit" button and the form-data will be sent to a page on the 
server called "action_page.php".</p>
$output=shell_exec("python analytics.py "  .$txt);
-->

<form action="welcome.php" method="post">
Question: <input type="text" name="name"><br>
<input type="submit">
</form>


<?php 
$txt = "variable here";

$output=shell_exec("python analytics.py try_var");
echo "$txt!";
?>

<img src='lines.png'/>

</body>
</html>

