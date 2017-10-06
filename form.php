<?php
include "conf.php";
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

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        body {
            background: #F5F5F5;
        }
        .sep-form {
            margin: 10px 0;
            border-color: lightslategrey;
        }
        .add-btn {
            width: 100%;
            margin: 5px auto;
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
                    <a class="nav-link" href="list.php"><h5><span class="glyphicon glyphicon-list"></span> See the Requirements Sheets</h5></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="form.php"><h5><span class="glyphicon glyphicon-plus-sign"></span> Add Requirement sheet</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.gfi.world/fr/"><h5><span class="glyphicon glyphicon-edit"></span> Contact</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="disconnect.php"><h5><span class="glyphicon glyphicon-ban-circle"></span> Disconnect</h5></a>
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
<div class="container">
    <h1 style="margin: 40px 0; text-align:center;">Add Requirement Sheet</h1>

    <form method="post" action="recupererDonnees.php" enctype="multipart/form-data">
        <input type='text' name='title' class="form-control" placeholder="Title"/>
        <input type="text" onfocus="(this.type='date')" name='date' class="form-control" placeholder="Start at least"/>
        <input type='text' name='client' id="client-input" class="form-control" placeholder="Client"/>
        <input type='text' name='contactName' class="form-control" placeholder="Contact Name"/>
        <textarea name='description' class="form-control" placeholder="Full Description"></textarea>
        <input type='text' name='location' class="form-control" placeholder="Location"/>
        <input type='text' name='rate' class="form-control" placeholder="Rate (€)"/>


        <hr class="sep-form">


        <div id="facs">
            <input type="text" id="successFactor1" name="successFactor1" class="form-control" placeholder="Main key success factor">
        </div>

        <div class="add-btn" id="add-fac">
            <button class="btn btn-default btn-grand" onclick="createElemFactors()" type="button">
                <span class="glyphicon glyphicon-plus-sign"></span> Add
            </button>
        </div><br />

        <!-- CONSULTANTS -->
        <div id = "consultants">
            <textarea name="consultant1" rows="2" cols="22" placeholder="Name of the consultant" class="form-control"></textarea>
        </div>

        <div class="add-btn" id="add-cons">
            <button class="btn btn-default btn-grand" onclick="createElemConsultant();" type="button">
                <span class="glyphicon glyphicon-plus-sign"></span> Add
            </button>
        </div>


        <hr class="sep-form">


        <input style="width: 49%; display: inline-block;" type='number' name='nbOfMonth' class="form-control" placeholder="Duration in month (1, 2, 3 ...)"/>
        <input class="form-control"  style="width: 49%; display: inline-block;" type="number" name="dayByWeek" placeholder="Day/Week (1,2,3..)"><br />

        <br>

        <select id="select" class="form-control" name="status">
            <option value="1">Open</option>
            <option value="2">Win</option>
            <option value="3">Lost</option>
        </select><br />
        <input type='text' name='saveAndShare' class="form-control" placeholder="Save & share"/> <br>
        Descritpion file : <br>
        <input type='file' name='descriptionFile' placeholder="Description file"/> <br /><br/>
        <button type='submit' class="btn btn-success btn-grand" name='envoyer'>Envoyer</button>
    </form>

</div>

<!-- Footer -->
<footer class="py-5 ">
    <div class="container">
        <p class="m-0 text-center">Copyright &copy; - GFI Informatique - 2017</p>
    </div>
    <!-- /.container -->
</footer>

<?php
$tabNamesClients = array();
$Customers = $apiHandler->CustomersAction->GetAll();
foreach ($Customers as $aCustomer){
    $tabNamesClients[] = $aCustomer->getCompanyName();
}
?>

</body>

</html>

</body>



<script type=text/javascript>
	function deleteSuccessFactor(whichOne) {
		$(whichOne).css("display", "none");
		$(whichOne + " input").val("");
	}
	function deleteConsultant(whichOne) {
		$(whichOne).css("display", "none");
		$(whichOne + " textarea").val("");
	}


    function supprElemFactors(){
        $(".rmFac").click(function () {
            nbFac = $(".fac").length + 1;
            console.log(nbFac);
            var id = $(this).attr("id").split("rmf")[1];
            var parent = $(this).parent();
            parent.remove();
            var i = 1;
            $(".rmFac").each(function () {
                i++;
                $(this).attr("id", "rmf" + i);
            });
            var j = 1;
            $(".input-fac").each(function () {
                j++;
                $(this).attr("id", "successFactor" + j).attr("name", "successFactor" + j);
            });
            var k =1;
            $(".fac").each(function () {
                k++;
                $(this).attr("id", "div-fac-" + k);
            });
        });
    }

    var maxFac = 3;
    var nbFac = 0;
    function createElemFactors() {
        nbFac = $(".fac").length + 1;
        if (nbFac < maxFac){
            nbFac++;
            var html = '<div id="div-fac-' + nbFac + '" class="input-group fac">';
            html += '<input id="successFactor' + nbFac + '" name="successFactor' + nbFac + '" placeholder="Main key success factor" class="form-control input-fac" />';
            html += '<span id="rmf' + nbFac + '" class="input-group-btn rmFac">';
            html += '<button type="button" class="btn btn-danger"> - </button>';
            html += '</span>';
            html += '</div>';
            $("#facs").append(html);
            supprElemFactors();
            /*if (nbFac == maxFac){
                $("#add-fac").hide();
            }*/
        }
    }




	function supprElemConsultant(){
        $(".rmCons").click(function () {
            nbConsultants = $(".cons").length + 1;
            /*if (nbConsultants < maxConsultants){
                $("#add-cons").show();
            }*/
            var id = $(this).attr("id").split("rmc")[1];
            var parent = $(this).parent();
            parent.remove();
            var i = 1;
            $(".rmCons").each(function () {
                i++;
                $(this).attr("id", "rmc" + i);
            });
            j = 1;
            $(".input-cons").each(function () {
                j++;
                $(this).attr("id", "consultant" + j).attr("name", "consultant" + j);
            });
            var k =1;
            $(".cons").each(function () {
                k++;
                $(this).attr("id", "div-cons-" + k);
            });
        });
    }

	var maxConsultants = 5;
	var nbConsultants = 0;
    function createElemConsultant() {
        nbConsultants = $(".cons").length + 1;
	    if (nbConsultants < maxConsultants){
	        nbConsultants++;
            var html = '<div id="div-cons-' + nbConsultants + '" class="input-group cons">';
            html += '<textarea id="consultant' + nbConsultants + '" name="consultant' + nbConsultants + '" rows="1" maxlength="500" cols="22" placeholder="Name of the consultant" class="form-control input-cons"></textarea>';
            html += '<span id="rmc' + nbConsultants + '" class="input-group-btn rmCons">';
            html += '<button type="button" class="btn btn-danger"> - </button>';
            html += '</span>';
            html += '</div>';
            $("#consultants").append(html);
            supprElemConsultant();
            /*if (nbConsultants == maxConsultants){
                $("#add-cons").hide();
            }*/
        }
    }

    <?php echo 'var tableau = new Array();';
    foreach ($tabNamesClients as $name){
        echo "tableau.push(\"" . $name . "\")";
    }
    ?>

    console.log(tableau);
    $( "#client-input" ).autocomplete({
        source: tableau
    });

	function createElem(whichOne) {
		$(whichOne).css("display", "block");
	}

</script>
