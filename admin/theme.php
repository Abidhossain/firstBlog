<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<?php  
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Change Theme</h2>
               <div class="block copyblock"> 
               <?php 
               if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { 
                    $theme   = mysqli_real_escape_string($db->link , $_POST['theme']);
                
                    $query = "UPDATE tbl_theme SET theme = '$theme' WHERE id = '1' ";
                    $updated_row = $db->update($query);
               if($updated_row){
                    echo "<span class='success'>Theme updated successfully !!</span>";
                }else{
                    echo "<span class='error'>Theme updated Failed !!</span>";
                }  }
               ?>
               <?php 
                    $query = "select * from tbl_theme where id='1'";
                    $theme = $db->select($query);
                    while($result  = $theme->fetch_assoc()){ 
               ?>
    <form action="" method="POST">
    <table class="form">
        <tr>
            <td> 
            <input <?php if($result['theme'] == 'Blue' ){echo "checked"; } ?>  type="radio" name="theme" value="Blue"/>Blue
            </td>
        </tr>	 
        <tr>
            <td> 
            <input <?php if($result['theme'] == 'Green' ){echo "checked"; } ?>  type="radio" name="theme" value="Green"  />Green
            </td>
        </tr>
        <tr>
            <td> 
            <input <?php if($result['theme'] == 'Default' ){echo "checked"; } ?> type="radio" name="theme" value="Default"  />Default
            </td>
        </tr>
        <tr> 
            <td>
                <input type="submit" name="submit" Value="Change" />
            </td>
        </tr>
    </table>
    </form> 
                <?php } ?>
                </div>
            </div>
        </div> 
<?php include 'inc/footer.php'?>