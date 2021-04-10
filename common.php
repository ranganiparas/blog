<?php
// // Turn off error reporting
// error_reporting(0);

// // Report all errors
// error_reporting(E_ALL);


// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
require_once("config/database.php");
require_once("config/constants.php");
require_once("content/header.php");

