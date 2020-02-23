<?php
require_once('core/config.php');
require_once('core/functions.php');
$conn = connect();


error_reporting(E_ALL);
ini_set('display_errors', 1);


inputDataUser ($conn);

close ($conn);


