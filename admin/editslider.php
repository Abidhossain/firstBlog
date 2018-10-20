<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<?php

    if (!isset($_GET['sliderid']) || $_GET['sliderid'] == NULL) {
        echo '<script>window.location = ("sliderlist.php")</script>' ; 
    }else{
      echo  $sliderid = $_GET['sliderid'];
    } 
?>
<div class="grid_10"> 
    <div class="box round first grid">
        <h2>Add New Post</h2>
        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { 
                $title   = mysqli_real_escape_string($db->link , $_POST['title']);
                
                //Slider Insert
                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];
            
                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "uploads/slider/".$unique_image; 

                //Form Validation
                if($title == ""){
                    echo '<span class="error">Field Must Not be Empty </span>';
                }else{
                if(!empty($file_name)){
                    if ($file_size >1048567) {
                    echo "<span class='error'>Image Size should be less then 1MB!</span>";
                } elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else{ 
                        move_uploaded_file($file_temp, $uploaded_image);
                        $query = "UPDATE tbl_slider
                                SET  
                                title   = '$title',
                                image   = '$uploaded_image' 
                                WHERE id = '$sliderid' ";
                        $updated_rows = $db->update($query);
                        if ($updated_rows) {
                            echo "<span class='success'>Post Updated Successfully.</span>";
                        }else {
                            echo "<span class='error'>Post Not Updated !</span>";
                        }
                    }
            }else{
                    $query = "UPDATE tbl_slider
                            SET  
                            title   = '$title'  
                            WHERE id = '$sliderid' ";
                        $updated_rows = $db->update($query);
                        if ($updated_rows) {
                            echo "<span class='success'>Post Updated Successfully.</span>";
                        }else {
                            echo "<span class='error'>Post Not Updated !</span>";
                        }
                }
            }
        }
        ?>
                <div class="block">  
                <?php  
                    $query = "SELECT * FROM tbl_slider WHERE id = '$sliderid'";
                    $getpost = $db->select($query); 
                    while ($post_result = $getpost->fetch_assoc()) {
                ?>             
    <form action="" method="POST" enctype="multipart/form-data">
    <table class="form">
        
        <tr>
            <td>
                <label>Title</label>
            </td>
            <td>
                <input type="text" name="title" value="<?php echo $post_result['title']?>" class="medium" />
            </td>
        </tr>
       
        <tr>
            <td>
                <label>Upload Image</label>
            </td>
            <td>
                <img src="<?php echo $post_result['image']?>" alt="post_image" height="100px" width="200px" ><br/>
                <input type="file" name="image" />
            </td>
        </tr> 
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" Value="Save" />
            </td>
        </tr>
    </table>
    </form>
                    <?php } ?>
                </div>
            </div>
        </div> 
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<?php include 'inc/footer.php'?>