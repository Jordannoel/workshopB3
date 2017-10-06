<?php
/**
 * Created by PhpStorm.
 * User: Niquelesstup
 * Date: 06/10/2017
 * Time: 02:00
 */

include "conf.php";
session_unset();
session_destroy();
header("Location: index.php");