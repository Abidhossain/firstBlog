<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<div class="grid_10">
            
    <div class="box round first grid">
        <h2>Update Social Media</h2>
        <?php 
         if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { 
            $facebook       = $fm->validation( $_POST['fb']);
            $twitter        = $fm->validation($_POST['tw']);
            $linkedin       = $fm->validation( $_POST['ln']);
            $googleplus     = $fm->validation($_POST['gg']);
            $facebook       = mysqli_real_escape_string($db->link , $facebook);
            $twitter        = mysqli_real_escape_string($db->link ,$twitter); 
            $linkedin       = mysqli_real_escape_string($db->link , $linkedin);
            $googleplus     = mysqli_real_escape_string($db->link ,$googleplus);
            //Form Validation
            if($facebook == "" || $twitter == "" || $linkedin == "" || $googleplus == ""  ){
                echo '<span class="error">Field Must Not be Empty </span>';
            }else{
             $query = "UPDATE tbl_social
                        SET 
                        fb     = '$facebook',
                        tw     = '$twitter',
                        ln     = '$linkedin',
                        gg     = '$googleplus'  
             WHERE id  = '1' ";
         $updated_sociallink = $db->update($query);
         if ($updated_sociallink) {
             echo "<span class='success'>Social media updated Successfully.</span>";
         }else {
             echo "<span class='error'>Social media not updated Successfully.!</span>";
         }
        }
    }
        ?>
        <div class="block"> 
        <?php
            $query = "select * from tbl_social where id = 1";
            $sociallink = $db->select($query);
            if ($sociallink) {
                    while ($result = $sociallink->fetch_assoc()) { 
        ?>              
        <form action="social.php" method="post">
        <table class="form">					
            <tr>
                <td>
                    <label>Facebook</label>
                </td>
                <td>
                    <input type="text" name="fb" value="<?php echo $result['fb'] ?>" class="medium" />
                </td>
            </tr>
                <tr>
                <td>
                    <label>Twitter</label>
                </td>
                <td>
                    <input type="text" name="tw" value="<?php echo $result['tw'] ?>"class="medium" />
                </td>
            </tr>
            
                <tr>
                <td>
                    <label>LinkedIn</label>
                </td>
                <td>
                    <input type="text" name="ln" value="<?php echo $result['ln'] ?>" class="medium" />
                </td>
            </tr>
            
                <tr>
                <td>
                    <label>Google Plus</label>
                </td>
                <td>
                    <input type="text" name="gg" value="<?php echo $result['gg'] ?>" class="medium" />
                </td>
            </tr>
            
                <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Update" />
                </td>
            </tr>
        </table>
        </form>
        <?php } } ?>
            </div>
    </div>
</div> 
<?php include 'inc/footer.php'?>