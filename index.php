<!doctype html>
<html lang="fr">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Snap-it</title>
</head>
<body>
<?php
include "conf.php";
//Recupérer les fiches besoin
//$apiHandler->RequirementsAction->GetAll();

if (isset($_GET["error"])) {
    $error = htmlspecialchars($_GET["error"]);
    ?>
    <div style="display: block;" class="modal" id="modalError">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">An error occured...</h4>
                </div>
                <div class="modal-body">
                    <p>
                        <?php if ($_GET["error"] == 1)
                            echo "Your e-mail adress format is invalid.<br /> Your adress have to finish by @gfi.fr";
                        elseif ($_GET["error"] == 2 && isset($_GET["message"]))
                            echo htmlspecialchars($_GET["message"]); ?>
                    </p>
                </div>
                <div class="modal-footer">
                    <button onclick="$('#modalError').hide();" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
<div class="container">
    <form method="post" action="connect.php">
        <input type="email" name="email" id="email" autofocus required/>
        <input type="password" name="password" id="password" required/>
        <input type="submit" value="Se connecter" />
    </form>
</div>
</body>
