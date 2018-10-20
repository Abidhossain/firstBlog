<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2> 
                <div class="block">  
                    <table class="data display datatable table" id="example">
					<thead>
						<tr>
							<th>No.</th>
							<th>Post Title</th>  
							<th>Image</th> 
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = "select * from tbl_slider";
						$slider  = $db->select($query);
						$i=0;
						if($slider){
							while ($result = $slider->fetch_assoc()) {
								$i++; 
					?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td> 
							<td><?php echo $fm->textShort($result['title'], 20)?></td>
							<td width="10%">
								<img height="45px" width="60px" src="<?php echo $result['image']?>" alt="post-image">
							</td>  
						<td> 	 
		<?php 
			if (Session::get('userrole') == '0') { ?>
				 <a href="editslider.php?sliderid=<?php echo $result['id'] ?>">Edit</a> ||<a href="deleteslider.php?sliderid=<?php echo $result['id'] ?>" onclick="return confirm('Are you sure to delete this post ?')">Delete</a>
		<?php } ?>
							
                </td>
                </tr>
                    <?php } } ?>
            </tbody>
        </table>
	
               </div>
            </div>
        </div> 
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
<?php include 'inc/footer.php'?>