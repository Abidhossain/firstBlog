<?php include 'inc/header.php' ?> 
<?php include 'inc/sidebar.php' ?> 

<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Copyright Text</h2>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { 
        $getcopyright       = $fm->validation( $_POST['copyright']);
        
        $getcopyright       = mysqli_real_escape_string($db->link , $getcopyright);
        
        //Form Validation
        if($getcopyright == "" ){
            echo '<span class="error">Copyright Must Not be Empty </span>';
        }else{
            $query = "UPDATE tbl_footer
                    SET 
                    copyright     = '$getcopyright'
            WHERE id  = '1' ";
        $updated_copyright = $db->update($query);
        if ($updated_copyright) {
            echo "<span class='success'>Copyright updated Successfully.</span>";
        }else {
            echo "<span class='error'>Copyright not updated Successfully.!</span>";
        }
    }
}
?>
        <div class="block copyblock"> 
<?php
    $query = "select * from tbl_footer where id = 1";
    $getcopyright = $db->select($query);
    if ($getcopyright) {
            while ($result = $getcopyright->fetch_assoc()) { 
?> 
            <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" name="copyright" value="<?php echo $result['copyright'] ?>"  class="large" />
                    </td>
                </tr>
                
                    <tr> 
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
<?php include 'inc/footer.php' ?>