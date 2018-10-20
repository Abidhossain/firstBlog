<?php
	include '../lib/Session.php';
	    Session::checkSession();
?>
<?php include '../config/config.php'?>
<?php include '../lib/Database.php'?>
<?php include '../helpers/Format.php'?>
<?php 
	$db = new Database(); 
?>
<?php 
    if (!isset($_GET['sliderid']) || $_GET['sliderid'] == NULL ) {
    echo '<script>window.location = "postlist.php" </script>';
    }else{
        $delid = $_GET['sliderid'];
        $query = "select * from tbl_slider where id = '$delid'";
        $getData = $db->select($query);
        if($getData){
            while ($delimg = $getData->fetch_assoc()) {
                $dellink = $delimg['image'];
                unlink($dellink);
                }
        }
        $delquery = "delete from tbl_slider where id = '$delid'";
        $delData = $db->delete($delquery);
        if($delData){
            echo '<script>alert("Data deleted Succssfully.")</script>';
            echo '<script>window.location = "sliderlist.php" </script>';
        }else{
            echo '<script>alert("Data not deleted Succssfully.")</script>';
            echo '<script>window.location = "sliderlist.php" </script>'; 
        }
    }
?>