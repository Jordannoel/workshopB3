<?php

use \SnapAtSdk\ClassesMetiers\Commercials;
use \SnapAtSdk\Exceptions\ReponseException;

include "conf.php";


$toTest = explode('@', $_POST["email"])[1];
if (isset($_POST['email']) && isset($_POST['password'])) {
    if ($toTest == 'gfi.fr') {
        try {
            $commercial = new Commercials();
            $commercial->setEmailAdress($_POST["email"]);
            $commercial->setPassword($_POST["password"]);
            $commercial_connecte = $apiHandler->ConnectionAction->Post($commercial);
            $_SESSION["commercial"] = serialize($commercial_connecte);
            header('location:list.php');
        }catch (ReponseException $ex) {
            header('location:index.php?error=2&message=' . $ex->getReponse());
            //echo $ex->getMessage() . " <br /> " . $ex->getReponse();
        }
    } else {
        // Redirection sur la page de login en cas d'erreur
        header('location:index.php?error=1');
    }
}
else {

}