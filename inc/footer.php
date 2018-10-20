</div>
<div class="footersection templete clear">
	  <div class="footermenu clear">
	
	  </div>
		<?php
				$query = "select * from tbl_footer where id = 1";
				$copyright= $db->select($query);
				if ($copyright) {
								while ($result = $copyright->fetch_assoc()) { 
		?> <br/>
	  <p><span style="font-size:20px; font-width:bolder;">&copy</span><?php echo $result['copyright'];echo date(' Y')?></p>
		<?php } } ?>
	</div>
	<div class="fixedicon clear">
		<?php
				$query = "select * from tbl_social where id = 1";
				$sociallink = $db->select($query);
				if ($sociallink) {
								while ($result = $sociallink->fetch_assoc()) { 
		?> 
		<a href="<?php echo $result['fb'] ?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $result['tw'] ?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $result['ln'] ?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $result['gg'] ?>"><img src="images/gl.png" alt="GooglePlus"/></a>
		<?php } } ?>
	</div>

<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>