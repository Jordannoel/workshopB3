<?php
/**
 * Created by PhpStorm.
 * User: Niquelesstup
 * Date: 05/10/2017
 * Time: 00:43
 */

use \SnapAtSdk\SnapAt;

session_start();
require "SnapAtSdk/Autoloader.php";
define("API_KEY", "BOdiSG8uGKY2VUoaNDt7QsHDs7U=");
$apiHandler = new SnapAt(true,API_KEY);