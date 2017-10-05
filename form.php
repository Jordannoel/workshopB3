<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<form method="post" action="liste.php" enctype="multipart/form-data">
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
		<button type = "button" class="btn btn-danger" onclick="deleteSuccessFactor('#successFactor2')"> - </button> <br>
	</div>

	<div id="successFactor3" style="display:none;">
		<input id="test" type='text' name='successFactor3' placeholder="3rd main key success factor" class="form-control"/>
		<button type = "button" class="btn btn-danger" onclick="deleteSuccessFactor('#successFactor3')"> - </button> <br>
	</div>
	<br>

	Duration(months) : <br>
	<input type='number' name='nbOfMonth' class="form-control"/> <br>
	Days/Week : <br>
	<select id="select" name="daysPerWeek">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
	</select>
	<br>
	<br>

	Start at the latest : <br>
	<input type='date' name='startAtLatest' class="form-control"/> <br>
	Location : <br>
	<input type='text' name='location' class="form-control"/> <br>
	Rate (Euro HT) : <br>
	<input type='text' name='rate' class="form-control"/> <br>
	Descritpion file : <br>
	<input type='file' name='descriptionFile'/> <br>
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
		<button type = "button" class="btn btn-danger" onclick="deleteConsultant('#consultant5')"> - </button> <br>
	</div>
	<br>
	Status : <br>
	<select id="select" name="status">
		<option value="1">Open</option>
		<option value="2">Win</option>
		<option value="3">Lost</option>
	</select>
	<br>
	<br>
	Save and Share : <br>
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
