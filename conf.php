<?php session_start();
use \SnapAtSdk\SnapAt;

require "SnapAtSdk/Autoloader.php";
define("API_KEY", "BOdiSG8uGKY2VUoaNDt7QsHDs7U=");
$apiHandler = new SnapAt(true,API_KEY);