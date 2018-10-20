<?php include 'config/config.php'?>
<?php include 'lib/Database.php'?>
<?php include 'helpers/Format.php'?>
<?php 
	$db = new Database();
	$fm = new Format(); 
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'scripts/meta.php' ?>
	<?php include 'scripts/css.php' ?>
	<?php include 'scripts/js.php' ?>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">
		<?php
            $query = "select * from title_slogan where id = 1";
            $title_slogan = $db->select($query);
            if ($title_slogan) {
                while ($result = $title_slogan->fetch_assoc()) { 
        ?>
				<img src="admin/<?php echo $result['logo'] ?>" alt="Logo"/>
				<h2><?php echo $result['title'] ?></h2>
				<p><?php echo $result['slogan'] ?></p>
			</div>
		<?php } } ?>
		</a>
		<div class="social clear">
		<?php
            $query = "select * from tbl_social where id = 1";
            $sociallink = $db->select($query);
            if ($sociallink) {
                    while ($result = $sociallink->fetch_assoc()) { 
        ?> 
			<div class="icon clear">
				<a href="<?php echo $result['fb'] ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $result['tw'] ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $result['ln'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $result['gg'] ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
		<?php } } ?>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
 
	<ul>
		<li><a  href="index.php">Home</a></li> 
		<?php
            $query = "select * from tbl_page";
            $getpage = $db->select($query);
            if ($getpage) {
                    while ($result = $getpage->fetch_assoc()) { 
        ?>
		<li>
			<a href="dynamicpage.php?pageid=<?php echo $result['id']; ?>"><?php echo $result['name']?></a>
		</li> 
		<?php } } ?>
		<li><a href="contact.php">Contact</a></li>
	</ul>
</div>
