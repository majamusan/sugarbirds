<?php
namespace simulation;
require_once 'sun.php';
$sun = New Sun();
echo "\r\n\r\nSimulation results:  ".$sun->doIt()."\r\n";
