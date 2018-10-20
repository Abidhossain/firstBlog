<?php
	include '../lib/Session.php';
	Session::checkLogin();
?>
<?php include '../config/config.php'?>
<?php include '../lib/Database.php'?>
<?php include '../helpers/Format.php'?>
<?php 
	$db = new Database();
	$fm = new Format(); 
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
	<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
			$email   = $fm->validation(mysqli_real_escape_string($db->link,$_POST['email']));
			if(!(filter_var(FILTER_VALIDATE_EMAIL))){
				echo 'Invalid Email Address';
			}else{
			 $getmail = "SELECT * FROM tbl_user WHERE email='$email' LIMIT 1";
			 $checkmail = $db->select($getmail);
			 if ($checkmail != false) {
					while($value = $checkmail->fetch_assoc()){
						$userid = $value['id'];
						$username = $value['username'];
					}
					$text        = substr($email,0,3);
					$rand        = rand(10000,99999);
					$newpassword = "$text$rand"; 
					$password    = md5($newpassword);

					$query = "UPDATE tbl_user 
							  SET
							  password = '$password'
							  WHERE id = '$userid' 
					";
					 $updatepass = $db->update($query);
					 $to = $email;
					 $from = "hossain835428@gmail.com";
					 $headers = "From:$from\n"; 
					 $subject = "Your Password ";
					 $massage = "Your username is .$username. and your password is .$newpassword. please visit website to login";
					 $sendmail = mail($to, $from, $subject, $headers, $massage );
					 if ($sendmail) {
						echo "<span style='color:green;font-size:18px;'><p>Please Check your email !</p></span>";
					 }else{
						echo "<span style='color:red;font-size:18px;'><p>Email Not Sent !</p></span>";
					 }
			 }else{
				 echo "<span style='color:red;font-size:18px;'><p>Email Not Exists !</p></span>";
			 }
			}
		}
	?>
		<form action="" method="post">
		
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Enter valid Email" required="" name="email"/>
			</div>
			<div>
				<input type="submit" value="Send Mail" />
			</div>
		</form><!-- form -->
        <div class="button">
			<a href="login.php">Login</a>
		</div><!-- button -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>