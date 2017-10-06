<?php
include "conf.php";
use SnapAtSdk\ClassesMetiers\Requirements;
use SnapAtSdk\ClassesMetiers\Status;

	if(isset($_POST['date']) && isset($_POST['client']) && isset($_POST['contactName']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['successFactor1']) && isset($_POST['nbOfMonth']) && isset($_POST['dayByWeek']) && isset($_POST['location']) && isset($_POST['rate']) && isset($_POST['consultant1']) && isset($_POST['status'])){

		$requirements = new Requirements();

		$date = htmlspecialchars($_POST['date']);
		$cient = htmlspecialchars($_POST['client']);
		$contactName = htmlspecialchars($_POST['contactName']);
		$title = htmlspecialchars($_POST['title']);
		$description = htmlspecialchars($_POST['description']);
		$successFactor1 = htmlspecialchars($_POST['successFactor1']);
        $keySuccessFactor1 = new \SnapAtSdk\ClassesMetiers\KeySuccessFactors();
        $keySuccessFactor1->setText($successFactor1);
        $requirements->addKeySuccessFactorsList($keySuccessFactor1);
		if(isset($_POST['successFactor2'])){
			$successFactor2 = htmlspecialchars($_POST['successFactor2']);
            $keySuccessFactor2 = new \SnapAtSdk\ClassesMetiers\KeySuccessFactors();
            $keySuccessFactor2->setText($successFactor2);
            $requirements->addKeySuccessFactorsList($keySuccessFactor2);
		}
		if(isset($_POST['successFactor3'])){
			$successFactor3 = htmlspecialchars($_POST['successFactor3']);
            $keySuccessFactor3 = new \SnapAtSdk\ClassesMetiers\KeySuccessFactors();
            $keySuccessFactor3->setText($successFactor3);
            $requirements->addKeySuccessFactorsList($keySuccessFactor3);
		}
		$nbOfMonth = htmlspecialchars($_POST['nbOfMonth']);
		$daysPerWeek = htmlspecialchars($_POST['dayByWeek']);
		$location = htmlspecialchars($_POST['location']);
		$rate = htmlspecialchars($_POST['rate']);
		$consultant1 = htmlspecialchars($_POST['consultant1']);
		$consultantObj1 = new \SnapAtSdk\ClassesMetiers\Consultants();
		$consultantObj1->setName($consultant1);
		$requirements->addConsultantsList($consultantObj1);
		if(isset($_POST['consultant2'])){
			$consultant2 = htmlspecialchars($_POST['consultant2']);
            $consultantObj2 = new \SnapAtSdk\ClassesMetiers\Consultants();
            $consultantObj2->setName($consultant2);
            $requirements->addConsultantsList($consultantObj2);
		}
		//var_dump($requirements->getConsultantsList());
		if(isset($_POST['consultant3'])){
			$consultant3 = htmlspecialchars($_POST['consultant3']);
            $consultantObj3 = new \SnapAtSdk\ClassesMetiers\Consultants();
            $consultantObj3->setName($consultant3);
            $requirements->addConsultantsList($consultantObj3);
		}
		if(isset($_POST['consultant4'])){
			$consultant4 = htmlspecialchars($_POST['consultant4']);
            $consultantObj4 = new \SnapAtSdk\ClassesMetiers\Consultants();
            $consultantObj4->setName($consultant4);
            $requirements->addConsultantsList($consultantObj4);
		}
		if(isset($_POST['consultant5'])){
			$consultant5 = htmlspecialchars($_POST['consultant5']);
            $consultantObj5 = new \SnapAtSdk\ClassesMetiers\Consultants();
            $consultantObj5->setName($consultant5);
            $requirements->addConsultantsList($consultantObj5);
		}
		$status = new Status();
		$status->setId($_POST['status']);

		//$saveAndShare = htmlspecialchars($_POST['saveAndShare']);


		$requirements->setStartDate($date);
		$requirements->setLocation($location);
		$requirements->setRate($rate);
		$requirements->setNbOfMonth($nbOfMonth);
		$requirements->setDayByWeek($daysPerWeek);
		$requirements->setContactName($contactName);
		$requirements->setTitle($title);
		$requirements->setFullDescription($description);
		//$requirements->setShareTo($saveAndShare);
		$cust = new \SnapAtSdk\ClassesMetiers\Customers();
		$cust->setId(1);
		$requirements->setCustomer($cust);
		$requirements->setCommercial(unserialize($_SESSION["commercial"]));
		$requirements->setStatus($status);
		

		function upload($index, $destination, $maxsize = FALSE, $extensions = FALSE){
		   //Test1: fichier correctement upload�
			 if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
		   //Test2: taille limite
			 if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
		   //Test3: extension
			 $ext = substr(strrchr($_FILES[$index]['name'], '.'), 1);
			 if ($extensions !== FALSE AND !in_array($ext, $extensions)) return FALSE;
		   //D�placement
			 return move_uploaded_file($_FILES[$index]['tmp_name'], $destination);
		}

		//EXEMPLES
		/*$upload = upload('descriptionFile', 'description/'.date('Y-m-d H:i:s').$_FILES['descriptionFile']);

		if ($upload) {
			"Upload de l'icone r�ussi!<br />";
		}*/

		//var_dump($requirements);

		try {
            $new_require = $apiHandler->RequirementsAction->Creer($requirements);
            header("Location: list.php");
            //ar_dump($new_require);
        }catch (\SnapAtSdk\Exceptions\ReponseException $ex){
			echo $ex;
		}
	}else{
		echo "lol";
	}
?>
