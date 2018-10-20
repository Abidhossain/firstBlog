<?php include 'inc/header.php' ?>
<?php include 'inc/slider.php' ?> 
<style>
.error{
	float:left;
}
</style>
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
		$firstname   = $fm->validation(mysqli_real_escape_string($db->link,$_POST['firstname']));
		$lastname    = $fm->validation(mysqli_real_escape_string($db->link,$_POST['lastname']));
		$email       = $fm->validation(mysqli_real_escape_string($db->link,$_POST['email']));
		$body        = $fm->validation(mysqli_real_escape_string($db->link,$_POST['body']));

		$errorf       = "";
		$errorl       = "";
		$errore       = "";
		$errorb       = "";
		$successmsg       = "";

		if (empty($firstname)) { 
			$errorf = "First name must not be empty !";
		}if(empty($lastname)){
			$errorl = "Last name must not be empty !";
		}
		if (empty($email)) { 
			$errore = "Email must not be empty !";
		}if(empty($body)){
			$errorb = "Body must not be empty !";
		}else{
			$query = "INSERT INTO tbl_contact(firstname,lastname,email,body) VALUES('$firstname','$lastname','$email','$body')";
			$contactmsg = $db->insert($query);
			if($contactmsg){
				$successmsg = "<span class='success'>Message sent successfully.</span>";
			}else{
				$successmsg =  "<span class='error'>Message not sent !!</span>";
			}
		}

}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php 
					if(isset($successmsg)){
						echo '<span class="success">'.$successmsg.'</span>';
					 }
				?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
						<?php  
							if (isset($firstname)) {
							echo '<span class="error">'.$errorf.'</span>';
							}
						?>
					<input type="text" name="firstname" placeholder="Enter first name *" />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
						<?php  
							if (isset($lastname)) {
							echo '<span class="error">'.$errorl.'</span>';
							}
						?>
					<input type="text" name="lastname" placeholder="Enter Last name *" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
						<?php  
							if (isset($email)) {
							echo '<span class="error">'.$errore.'</span>';
							}
						?>
					<input type="email" name="email" placeholder="Enter Email Address *" />
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
						<?php  
							if (isset($body)) {
							echo '<span class="error">'.$errorb.'</span>';
							}
						?>
					<textarea name="body" placeholder="Enter details here *" ></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>
</div> 

<?php include 'inc/sidebar.php' ?>
<?php include 'inc/footer.php' ?>
