<?php
	class Actions
	{
		private $dbh = null;

		public function __construct($db)
		{
			$this->dbh = $db->dbh;
		}

        public function saveData($visatype, $c2go, $processing, $familyname, $givenname, $dob, $pob, $gender, $nationality, $passport_number, $p_doi, $p_doe, $issue_auth, $address, $country, $mobile, $email, $trackingNumber, $OrderID, $applydate){
			$request = $this->dbh->prepare("INSERT INTO tbl_application (VisaType, WantToGo, ProcessingType, FirstName, LastName, DateOfBirth, CountryOfBirth, Gender, Nationality, PassportNumber, PassportIssueDate, PassportExpirationDate, IssuingAuthority, PresentAddress, Country,  Phone, Email, TrackingNumber, OrderID, Applydate) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$request->execute([$visatype, $c2go, $processing, $familyname, $givenname, $dob, $pob, $gender, $nationality, $passport_number, $p_doi, $p_doe, $issue_auth, $address, $country, $mobile, $email, $trackingNumber, $OrderID, $applydate]);
			$last_id = $this->dbh->lastInsertId();
			$new_RQ = $this->dbh->prepare('INSERT INTO tbl_status (AppID, Status) VALUES (?,?)');
			return $new_RQ->execute([$last_id, 0]);
		}
		
		public function fetchData($limit = 10){
			$request = $this->dbh->prepare("SELECT * FROM tbl_application   ORDER BY id DESC  LIMIT $limit");
			if ($request->execute()) {
				return $request->fetchAll();
			}
			return false;
		}
		public function fetchCountries(){
			$request = $this->dbh->prepare("SELECT * FROM tbl_country   ORDER BY id");
			if ($request->execute()) {
				return $request->fetchAll();
			}
			return false;
		}
		
		public function fetchLastID(){
			$request = $this->dbh->prepare("SELECT MAX(OrderID) AS LastID FROM tbl_application LIMIT 1");
			if ($request->execute()) {
				return $request->fetch();
			}
			return false;
		}

		public function updateAccount($id, $user_name, $email, $full_name, $address, $contact){
			$request = $this->dbh->prepare("UPDATE accounts SET username =?, email =?, fullname =?, address= ?, contact =? WHERE user_id =?");
			return $request->execute([$user_name, $email, $full_name, $address, $contact, $id]);
		}
		public function activateTeacher($id){
			$request = $this->dbh->prepare("UPDATE accounts SET status = 1, semister_id = 0 WHERE id = ? AND role = 'teacher'");
			return $request->execute([$id]);
		}

		public function deleteAdmin($id){
			$request = $this->dbh->prepare("DELETE FROM accounts WHERE id = ?");
			return $request->execute([$id]);
		}
    }