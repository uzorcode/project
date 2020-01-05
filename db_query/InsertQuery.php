<?php
require 'DBConnect.php';

class InsertQuery extends ConnectionDB {
	public function register_details($title, $firstname, $lastname, $email, $username, $password) {
		$sql = "INSERT INTO register_details (title, firstname, lastname, email, username, password) VALUES(:title, :firstname, :lastname, :email, :username, :password)";
        $this->conn-> prepare($sql);
		$query->execute([
			'title'=>$title,
			'firstname'=>$firstname,
			'lastname'=>$lastname, 
			'email'=>$email,
			'username'=>$username,
			'password'=>$password
		]);

		if ($query->errorCode() == 0) {
			return ['status'=>true,'message'=>"Data Inserted Successfully"];
		} else {
			$message = $query->errorInfo();

			return ['status'=>false,'message'=>"There was an error-" . $message[2]];
		}
		}
}
?>
