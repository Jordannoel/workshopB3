<?php
include "conf.php";
if (!isset($_SESSION["commercial"]))
    header("Location: index.php");
//Recupérer les fiches besoin
$requirements = $apiHandler->RequirementsAction->GetAll(); ?>
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
        body {
            background: #F5F5F5;
        }
        button a, button a:hover, button a:focus {
            color: white;
            text-decoration: none;
        }
        .one-require {
            background: white;
            padding: 10px;
            border-bottom: 1px solid lightslategrey;
        }
        .one-title {
            font-size: 20px;
        }

        .one-require {

        }
        h1 {
            font-size: 25px;
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

<?php
function labelizeStatus($status){
    if ($status->getId() == 1)
        return '<span class="label label-primary"> ' . $status->getName() . '</span>';
    elseif ($status->getId() == 2)
        return '<span class="label label-success"> ' . $status->getName() . '</span>';
    elseif ($status->getId() == 3)
        return '<span class="label label-danger"> ' . $status->getName() . '</span>';
}
?>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color: #2f3649">
    <div class="container">
        <a class="navbar-brand" href="index.html"><h4>GFI</h4></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="list.php"><h5><span class="glyphicon glyphicon-list"></span> See the Requirements Sheets</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form.php"><h5><span class="glyphicon glyphicon-plus-sign"></span> Add Requirement sheet</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html"><h5><span class="glyphicon glyphicon-edit"></span> Contact</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html"><h5><span class="glyphicon glyphicon-ban-circle"></span> Disconnect</h5></a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h1 style="margin: 40px 0; text-align:center;">Requirements Sheets list</h1>

    <button class="btn btn-success btn-grand">
        <a href="form.php">
            <span class="glyphicon glyphicon-plus-sign"></span> Add a new requirement sheet
        </a>
    </button>

    <div id="tri" style="margin: 20px 0;">
        <div class="row">
            <div class="col-md-12">
                <input type="text" placeholder="Recherche..." class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <select class="form-control">
                    <option>Status</option>
                    <option>Title</option>
                    <option>Date</option>
                    <option>Customer</option>
                </select>
            </div>
        </div>
    </div>

    <div id="requirements">
        <?php if (count($requirements) > 0) {
            foreach ($requirements as $oneRequire) { ?>
                <div class="row one-require" id="req-<?php echo $oneRequire->getId(); ?>">
                    <div class="col-lg-12">
                        <strong class="one-title"><?php echo $oneRequire->getTitle(); ?></strong>
                        <span class="btn-danger delete-req" id="del-<?php echo $oneRequire->getId(); ?>" style="float: right; padding: 0 8px 2px;">x</span> <br />
                        <span class="glyphicon glyphicon-calendar"></span> Starts at least on : <?php echo explode(" ", $oneRequire->getStartDate())[0]; ?><br />
                        <span class="glyphicon glyphicon-euro"></span> <?php echo $oneRequire->getRate(); ?>
                        <span style="float: right;"><?php echo labelizeStatus($oneRequire->getStatus()); ?></span><br />
                        <span class="glyphicon glyphicon-user"></span> <?php echo $oneRequire->getCustomer()->getCompanyName(); ?>
                    </div>
                </div>
            <?php }
        }?>
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

<script>
    $(".delete-req").click(function () {
        if (confirm("Are you sure you want to delete this sheet ?")){
            var id = $(this).attr("id");
            id = id.split("del-")[1];
            $.post("delete_requirement.php", {id:id}, function (data) {
                if (data == "ok")
                    $("#req-" + id).hide();
                else
                    console.log(data);
            })
        }
    })
</script>

</body>

</html>

</body>
