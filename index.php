<?php
include "conf.php";
if (isset($_SESSION["commercial"]))
    header("Location: list.php");
//Recupérer les fiches besoin
//$apiHandler->RequirementsAction->GetAll(); ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
        h1 {
            color: #ef9445;
        }
        h4{
            color: #ff8a28;
        }
        h5{
            color: #ff8a28;
        }
        .btn-zone {
            margin-top: 20px;
        }
    </style>
</head>

<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color: #2f3649">
    <div class="container">
        <a class="navbar-brand" href="index.php"><h4>GFI</h4></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://www.gfi.world/fr/"><h5>About</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.gfi.world/fr/"><h5>Contact</h5></a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<?php
if (isset($_GET["error"]) && !empty($_GET["error"])) {
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
<div class="container-fluid">
    <h1 style="margin: 40px 0; text-align:center;">Snap - AT</h1>
    <div class="container" style="margin: 40px auto;">
        <form method="post" action="connect.php">
            <input type="email" class="form-control" name="email" placeholder="E-mail adress (...@gfi.fr)" id="email" autofocus required/>
            <input type="password" class="form-control" name="password" placeholder="Your password" id="password" required/>
            <button class="btn btn-primary btn-grand btn-zone" type="submit">Connect to Snap-AT</button>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="py-5 ">
    <div class="container">
        <p class="m-0 text-center">Copyright &copy; - GFI Informatique - 2017</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>

</body>
