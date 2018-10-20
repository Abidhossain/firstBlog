
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<?php 
                    $query = "select * from tbl_theme where id='1'";
                    $theme = $db->select($query);
                    while($result  = $theme->fetch_assoc()){ 
						if($result['theme'] == 'Blue' ){
							echo '
							<link rel="stylesheet" href="theme/defualt.css">';
						}elseif($result['theme'] == 'Green' ){
							echo '
							<link rel="stylesheet" href="theme/green.css">';
						}
					}
    ?>