<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<form method="post" action="liste.php">
	Date : <br>
	<input type='date' name='date' class="form-control"/> <br>
	Client : <br>
	<input type='text' name='client' class="form-control"/> <br>
	Contact name : <br>
	<input type='text' name='contactName' class="form-control"/> <br>
	Title : <br>	
	<input type='text' name='title' class="form-control"/> <br>
	Full description : <br>
	<input type='text' name='description' class="form-control"/> <br>

	3 main key success factors : <br>
	<input id ="successFactor1" type='text' name='successFactor1' placeholder="1st main key success factor" class="form-control"/>
	<button type = "button" class="btn btn-success" onclick="createElem('#successFactor2')"> + </button> <br>

	<div id="successFactor2" style="display:none;">
		<input type='text' name='successFactor2' placeholder="2nd main key success factor" class="form-control"/>
		<button type = "button" class="btn btn-success" onclick="createElem('#successFactor3')"> + </button>
		<button type = "button" class="btn btn-danger" onclick="deleteSuccessFactor('#successFactor2')">  -</button> <br>
	</div>

	<div id="successFactor3" style="display:none;">
		<input id="test" type='text' name='successFactor3' placeholder="3rd main key success factor" class="form-control"/>
		<button type = "button" class="btn btn-danger" onclick="deleteSuccessFactor('#successFactor3')"> - </button> <br>
	</div>

	Duration(months) : <br>
	<input type='text' name='duration' class="form-control"/> <br>
	Start at the latest : <br>
	<input type='text' name='startAtLatest' class="form-control"/> <br>
	Location : <br>
	<input type='text' name='location' class="form-control"/> <br>
	Rate (Euro HT) : <br>
	<input type='text' name='rate' class="form-control"/> <br>
	Descritpion file : <br>
	<input type='text' name='descriptionFile' class="form-control"/> <br>
	Consultants name : <br>
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
		<button type = "button" class="btn btn-success" onclick="deleteConsultant('#consultant5')"> - </button> <br>
	</div>
	Save & Share : <br>
	<input type='text' name='saveAndShare' class="form-control"/> <br>
	<button type='submit' name='envoyer'>Envoyer</button>
</form>

<h2 id='result'></h2>

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
