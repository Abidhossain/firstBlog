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
    if (!isset($_GET['delid']) || $_GET['delid'] == NULL ) {
    echo '<script>window.location = "page.php" </script>';
    }else{
        $delpageid = $_GET['delid'];
        
        $delquery = "delete from tbl_page where id = '$delpageid'";
        $delpage = $db->delete($delquery);
        if($delpage){
            echo '<script>alert("Page deleted Succssfully.")</script>';
            echo '<script>window.location = "index.php" </script>';
        }else{
            echo '<script>alert(Page not deleted !")</script>';
            echo '<script>window.location = "index.php" </script>';
        }
    }
?>