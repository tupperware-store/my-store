<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title >Tupperware</title>
    <link href="style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/icon.png" type="image/x-icon"/>
</head>
<body>
<section id='fproduct'>
	
	<div id="pro-con" style='display: flex;
    justify-content: left;
    padding-top: 20px;
    flex-wrap: wrap;
    margin-bottom: 100px;'>
		
	<?php
		include('connect.php');
		$select_query="Select * from `var_name`";
		$exec= mysqli_query($con, $select_query);
		while($row=mysqli_fetch_assoc($exec)){
			$type_name=$row['type_name'];
			$select_var= "Select * from `variety` where type_name= '$type_name'";
			$exec_select= mysqli_query($con, $select_var);
			echo "
				<div class='pro' style='border-radius: 10px; border: 4px solid grey; width: 200px; display: table; justify-content: center; flex-wrap: wrap; margin: 30px; padding: 15px 15px 15px 15px; '>
				<p style='margin-top: 30px; font-weight: 900; margin-top: 0px; font-size: 30px;'>$type_name</p>";
			while($row_1=mysqli_fetch_assoc($exec_select)){
				$name_var=$row_1['name_var'];
				
				echo "<p style='color: black; font-size: 20px; font-weight: 900;'>$name_var</p>
						";
			}
			echo "</div>";
		}
	
	?>
	
	</div>
</section>
</body>