<!DOCTYPE html>
<html>
<body>
<?php 
$output=shell_exec("python analytics.py 'try_var'");
echo "$output!";
?>
</body>
</html>