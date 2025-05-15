<?php
 /*
  We will include config.php for connection with database.
  We will get datas from index.php file, and inster them into database when Sign up button is clicked in index.php file.
  If any of session is empty we will get a message
  */

	include_once('config.php');

	if(isset($_POST['submit']))
	{

		$emri = $_POST['emri'];
		$username = $_POST['username'];
		$email = $_POST['email'];

		$tempPass = $_POST['password'];
		$password = password_hash($tempPass, PASSWORD_DEFAULT);



		$tempConfirm = $_POST['confirm_password'];
		$confirm_password = password_hash($tempConfirm, PASSWORD_DEFAULT);


		if(empty($emri) || empty($username) || empty($email) || empty($password) || empty($confirm_password))
		{
			echo "You have not filled in all the fields.";
		}
		else
		{

			$sql = "INSERT INTO users(emri,username,email,password, confirm_password) VALUES (:emri, :username, :email, :password, :confirm_password)";

			$insertSql = $conn->prepare($sql);
			

			$insertSql->bindParam(':emri', $emri);
			$insertSql->bindParam(':username', $username);
			$insertSql->bindParam(':email', $email);
			$insertSql->bindParam(':password', $password);
			$insertSql->bindParam(':confirm_password', $confirm_password);

			$insertSql->execute();

			header("Location: login.php");


		}



	}


?>