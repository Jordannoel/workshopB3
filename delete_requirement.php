<?php
/**
 * Created by PhpStorm.
 * User: Niquelesstup
 * Date: 05/10/2017
 * Time: 16:28
 */

include "conf.php";

$id = htmlspecialchars($_POST["id"]);
try {
    $apiHandler->RequirementsAction->Supprimer($id);
    echo "ok";
}catch (\SnapAtSdk\Exceptions\ReponseException $ex){
    echo $ex->getReponse() . " - " . $ex->getMessage();
}