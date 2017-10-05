

<?php

use SnapAtSdk\ClassesMetiers\Requirements;
use SnapAtSdk\ClassesMetiers\Status;

	include "conf.php";

	if(isset($_POST['date']) && isset($_POST['client']) && isset($_POST['contactName']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['successFactor1']) && isset($_POST['nbOfMonth']) && isset($_POST['daysPerWeek']) && isset($_POST['startAtLatest']) && isset($_POST['location']) && isset($_POST['rate']) && isset($_POST['descriptionFile']) && isset($_POST['consultant1']) && isset($_POST['status']) && isset($_POST['saveAndShare'])){

		$date = htmlspecialchars($_POST['date']);
		$cient = htmlspecialchars($_POST['client']);
		$contactName = htmlspecialchars($_POST['contactName']);
		$title = htmlspecialchars($_POST['title']);
		$description = htmlspecialchars($_POST['description']);
		$successFactor1 = htmlspecialchars($_POST['successFactor1']);
		if(isset($_POST['successFactor2'])){
			$successFactor2 = htmlspecialchars($_POST['successFactor2']);
		}
		if(isset($_POST['successFactor2'])){
			$successFactor3 = htmlspecialchars($_POST['successFactor3']);
		}
		$nbOfMonth = htmlspecialchars($_POST['nbOfMonth']);
		$daysPerWeek = htmlspecialchars($_POST['daysPerWeek']);
		$startAtLatest = htmlspecialchars($_POST['startAtLatest']);
		$location = htmlspecialchars($_POST['location']);
		$rate = htmlspecialchars($_POST['rate']);
		$consultant1 = htmlspecialchars($_POST['consultant1']);
		if(isset($_POST['consultant2'])){
			$consultant2 = htmlspecialchars($_POST['consultant2']);
		}
		if(isset($_POST['consultant3'])){
			$consultant3 = htmlspecialchars($_POST['consultant3']);
		}
		if(isset($_POST['consultant4'])){
			$consultant4 = htmlspecialchars($_POST['consultant4']);
		}
		if(isset($_POST['consultant5'])){
			$consultant5 = htmlspecialchars($_POST['consultant5']);
		}
		$status = new Status($_POST['status'], 'Open');
		$saveAndShare = htmlspecialchars($_POST['saveAndShare']);

		$requirements = new Requirements();
		$requirements->setStartDate($date);
		$requirements->setLocation($location);
		$requirements->setRate($rate);
		$requirements->setNbOfMonth($nbOfMonth);
		$requirements->setDayByWeek($daysPerWeek);
		$requirements->setContactName($contactName);
		$requirements->setTitle($title);
		$requirements->setFullDescription($description);
		$requirements->setShareTo($saveAndShare);
		$requirements->setStatus($status);
		

	function upload($index, $destination, $maxsize = FALSE, $extensions = FALSE){
	   //Test1: fichier correctement uploadé
	     if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
	   //Test2: taille limite
	     if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
	   //Test3: extension
	     $ext = substr(strrchr($_FILES[$index]['name'], '.'), 1);
	     if ($extensions !== FALSE AND !in_array($ext, $extensions)) return FALSE;
	   //Déplacement
	     return move_uploaded_file($_FILES[$index]['tmp_name'], $destination);
	}
	 
	//EXEMPLES
	$upload = upload('descriptionFile', 'description/'.date('Y-m-d H:i:s').$_FILES['descriptionFile']);

	if ($upload) {
		"Upload de l'icone réussi!<br />";
	}

	$apiHandler->RequirementsAction->creer($requirements);
	$apiHandler->RequirementsAction->getAll();
	}
?>
