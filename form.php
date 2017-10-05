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
        <a class="navbar-brand" href="index.html"><h4>GFI</h4></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="about.html"><h5>About</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.html"><h5>Services</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html"><h5>Contact</h5></a>
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
    <h1 style="margin: 40px 0; text-align:center;">Add Requirement Sheet</h1>

    <form method="post" action="liste.php" enctype="multipart/form-data">
        <input type='date' name='date' class="form-control" placeholder="Date"/>
        <input type='text' name='client' class="form-control" placeholder="Client"/>
        <input type='text' name='contactName' class="form-control" placeholder="Contact Name"/>
        <input type='text' name='title' class="form-control" placeholder="Title"/>
        <input type='text' name='description' class="form-control" placeholder="Full Description"/>
        <input type='date' name='startAtLatest' class="form-control" placeholder="Start at the latest"/>
        <input type='text' name='location' class="form-control" placeholder="Location"/>
        <input type='text' name='rate' class="form-control" placeholder="Rate (€)"/><br />
            <div class="input-group">
                <input type="text" class="form-control" placeholder="1st main key success factor">
                <span class="input-group-btn">
                    <button class="btn btn-default" onclick="createElem('#successFactor2')" type="button">+</button>
                </span>
            </div>

        <div id="successFactor2" style="display:none;">
            <!--<input type='text' name='successFactor2' placeholder="2nd main key success factor" class="form-control" style="display: inline-block; width: 79%;">
            <button type = "button" class="btn btn-success" onclick="createElem('#successFactor3')"> + </button>-->
            <div class="input-group">
                <input type="text" class="form-control" placeholder="2nd main key success factor">
                <span class="input-group-btn">
                    <button class="btn btn-default" onclick="createElem('#successFactor3')" type="button">+</button>
                </span>
            </div>
            <button type = "button" class="btn btn-danger" onclick="deleteSuccessFactor('#successFactor2')"> - </button> <br>
        </div>

        <div id="successFactor3" style="display:none;">
            <input id="test" type='text' name='successFactor3' placeholder="3rd main key success factor" class="form-control"/>
            <button type = "button" class="btn btn-danger" onclick="deleteSuccessFactor('#successFactor3')"> - </button> <br>
        </div>
        <br>
        <input type='number' name='nbOfMonth' class="form-control" placeholder="Duration in month (1, 2, 3 ...)"/>
        <label style="width: 40%; display: inline-block; margin-left: 2px;"> Days/Week :</label>
        <div style=" display: inline-block; text-align: right;width: 58%;">
            <select style="display: inline-block;" id="select" class="form-control" name="daysPerWeek">
                <optgroup label="Nb. of days :">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </optgroup>
            </select>
        </div>
        <br>
        <br />
        Descritpion file : <br>
        <input type='file' name='descriptionFile' placeholder="Description file"/> <br />
        <div id = "consultant1">
            <textarea name="consultant1" rows="2" cols="22" placeholder="1st consultant" class="form-control"></textarea>
            <button type = "button" class="btn btn-success" onclick="createElem('#consultant2')"> + </button> <br>
        </div>
        <div id = "consultant2" style="display:none;">
            <textarea name="consultant2" rows="2" cols="22" placeholder="2nd consultant" class="form-control"></textarea>
            <button type = "button" class="btn btn-success" onclick="createElem('#consultant3')"> + </button>
            <button type = "button" class="btn btn-danger" onclick="deleteConsultant('#consultant2')"> - </button> <br>
        </div>
        <div id = "consultant3" style="display:none;">
            <textarea name="consultant3" rows="2" cols="22" placeholder="3rd consultant" class="form-control"></textarea>
            <button type = "button" class="btn btn-success" onclick="createElem('#consultant4')"> + </button>
            <button type = "button" class="btn btn-danger" onclick="deleteConsultant('#consultant3')"> - </button> <br>
        </div>
        <div id = "consultant4" style="display:none;">
            <textarea name="consultant4" rows="2" cols="22" placeholder="4th consultant" class="form-control"></textarea>
            <button type = "button" class="btn btn-success" onclick="createElem('#consultant5')"> + </button>
            <button type = "button" class="btn btn-danger" onclick="deleteConsultant('#consultant4')"> - </button> <br>

        </div>
        <div id = "consultant5" style="display:none;">
            <textarea name="consultant5" rows="2" cols="22" placeholder="5th consultant" class="form-control"></textarea>
            <button type = "button" class="btn btn-danger" onclick="deleteConsultant('#consultant5')"> - </button> <br>
        </div>
        <br>
        Status : <br>
        <select id="select" class="form-control" name="status">
            <option value="1">Open</option>
            <option value="2">Win</option>
            <option value="3">Lost</option>
        </select><br />
        <input type='text' name='saveAndShare' class="form-control" placeholder="Save & share"/> <br>
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

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

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

	function createElem(whichOne) {
		$(whichOne).css("display", "block");
	}

</script>
