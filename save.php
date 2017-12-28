<?php
require_once "includes/headx.php";
require_once "includes/actions.php";
    $actions = new Actions($dbh);
    if (isset($_POST['visatype']) && isset($_POST['passport_number'])){

        $LastID = $actions->fetchLastID();
        $OrderID = $LastID->LastID + 1;
        
        $visatype = $_POST['visatype'];
        $c2go = $_POST['c2g'];
        $processing = $_POST['processing'];

        $familyname = htmlspecialchars( $_POST['familyname'], ENT_QUOTES, 'UTF-8' );
        $givenname = htmlspecialchars( $_POST['givenname'], ENT_QUOTES, 'UTF-8' );
        $dob =date ('Y-m-d',strtotime($_POST['dob']));

        $pob = $_POST['pob'];
        $gender = htmlspecialchars( $_POST['gender'], ENT_QUOTES, 'UTF-8' );
        $nationality = $_POST['nationality'];
        $passport_number = $_POST['passport_number'];
        $p_doi = date('Y-m-d',strtotime($_POST['p_doi']));
        $p_doe = date('Y-m-d',strtotime($_POST['p_doe']));
        $issue_auth = $_POST['issue_auth'];

        $home = $_POST['home'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $address = $home.', '.$city.', '.$state;
        $country = $_POST['country'];

        $ccode = $_POST['ccode'];
        $mobile = $_POST['mobile'];
        $tel = $_POST['tel'];
        $email = $_POST['emailaddress'];

        $trackingNumber = (rand(100000,10000000));
        $applydate = date('Y-m-d');

        if (!$actions->saveData($visatype, $c2go, $processing, $familyname, $givenname, $dob, $pob, $gender, $nationality, $passport_number, $p_doi, $p_doe, $issue_auth, $address, $country, $mobile, $email, $trackingNumber, $OrderID, $applydate)){
            echo "Error Submisstion, Check your data and try again !";
        }else {
            echo "Succesfully applied ! your trackig number is <i> $trackingNumber </i> .";
            	/* mail sending option start */
				$mcontent = "<h4> Australia UK Visa Process Center</h4>";
				$mcontent .= "<p> Here is your login information for checking application status</p>";
				$mcontent .= "<p> Passport Number:  '".$passport_number."' </p>";
				$mcontent .= "<p> Tracking Number:  '".$trackingNumber."' </p>";
				$mcontent .= "<p> Please click following link for checking application status. </p>";
				$mcontent .= "<p> Status Checking Url: <a href='http://aus-ukvisaprocess.com/find_visa.php' target='_blank'>Check Status</a> </p>";
				$mcontent .= "<h4><br/><br/> Thank You. <br/> Visa Processing Team</h4>";
				require 'PHPMailer/PHPMailerAutoload.php';
				$mail = new PHPMailer;
				$mail->isMail();
				//$mail->isSMTP();
				//$mail->Host = 'smtp.gmail.com';
				//$mail->SMTPAuth = true;
				$mail->Username = 'primesiliconproject@gmail.com';
				$mail->Password = 'primesiliconbangladesh';
				$mail->SMTPSecure = 'tls';
				$mail->From = 'shatabdiit@gmail.com';
				$mail->FromName = 'Australia UK Visa Process';
				$mail->addAddress($email,$familyname);
				//$mail->addAddress('shatabdi.iceiu@gmail.com','Al-Amar Labanese Cuisine Bangladesh');
				//$mail->addAddress($email, $rowusermail['user_full_name']);
				$mail->addReplyTo('shatabdiit@gmail.com','Australia UK Visa Process');
				//$mail->addReplyTo($email, $name);
				$mail->WordWrap = 100;
				$mail->isHTML(true);
				$mail->Subject = 'Australia UK Visa Process Tracking Number';
				$mail->Body    = $mcontent;
				$mail->send();
				/* mail sending option end */
        }
    }