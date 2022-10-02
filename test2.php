<!DOCTYPE html>
<html>
<body>
<?php 
$output=shell_exec("python test.py 'try_var'");
echo "$output!";
?>
</body>
</html>