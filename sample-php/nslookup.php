<?php
$address = $_POST['address'];
$cmd = "nslookup ".$address;
echo "<pre>$cmd</pre>";
$output = shell_exec($cmd);
echo "<pre>$output</pre>";
?>