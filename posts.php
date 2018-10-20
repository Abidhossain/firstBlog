<?php include 'inc/header.php' ?> 
<?php 
	if (!isset($_GET['category']) || $_GET['category'] == NULL) {
		header('Location:404.php');
	}
	else{
		$catid = $_GET['category'];
	}
?>
<?php include 'inc/slider.php' ?> 
<div class="conte ntsection contemplete clear">
<div class="maincontent clear">

<?php
		$query = "SELECT * FROM tbl_post WHERE cat=$catid";
		$post = $db->select($query);
		if ($post) {
			while ($result = $post->fetch_assoc()) { 
	?>
<div class="samepost clear">
	<h2><a href="post.php?id=<?php echo $result['id'] ?>"><?php echo $result['title'] ?></a></h2>
		<h4>
			<?php echo $fm->formatDate($result['date']) ?> <a href="#"><?php echo $fm->ucase($result['author']) ; ?></a>
		</h4>
		<a href="#">
            <img src="admin/<?php echo $result['image'] ?>" alt="postimage"/>
        </a>
		<?php echo $fm->textShort($result['body']) ?>
		<div class="readmore clear">
		    <a href="post.php?id=<?php echo $result['id'] ?>">Read More</a>
		</div>
	</div> 
	<?php } }else{ ?>
	<?php echo '<b>No posts available in this category.</b>'; }?>
</div>
<?php include 'inc/sidebar.php' ?>
<?php include 'inc/footer.php' ?>
