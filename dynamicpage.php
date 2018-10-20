<?php include 'inc/header.php' ?> 
<?php 
	if (!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
		header('Location:404.php');
	}
	else{
		$id = $_GET['pageid'];
	}
?>
<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<div class="about">
			<?php 
				$query = "SELECT * FROM tbl_page WHERE id=$id";
				$post  =  $db->select($query);
				if ($post) {
					while ($result = $post->fetch_assoc()) { 
			?>
				<h2><?php echo $result['name'] ?></h2>
				 <p><?php echo $result['body'] ?></p>
			<?php } }else{ header('Location:404.php'); }?> 
	</div>
</div> 
<?php include 'inc/sidebar.php' ?>
<?php include 'inc/footer.php' ?>
