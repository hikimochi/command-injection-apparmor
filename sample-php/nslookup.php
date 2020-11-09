<?php
$address = $_POST['address'];
$cmd = "nslookup ".$address;
$output = shell_exec($cmd);
echo "<pre>$output</pre>";
?>