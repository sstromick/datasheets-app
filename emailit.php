<?php

// Turn on output buffering
ob_start();
include ("emailtest.php?type=abc");
//  Return the contents of the output buffer
$htmlStr = ob_get_contents();
// Clean (erase) the output buffer and turn off output buffering
ob_end_clean(); 

echo $htmlStr
?>