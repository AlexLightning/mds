<?php 
include "db_connect.php"; 
$sql = 'SELECT * 
		FROM users';
		
$query = mysqli_query($mysqli, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($mysqli));
}?>

<html>
	<head>
		<meta charset="utf-8">
	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		<title>SellIt</title>
		
		<!-- Bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">	
		
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cookie" />
		<link rel="stylesheet" href="css/style_users.css">
	</head>
<body>

		<nav class="navbar navbar-inverse navbar-fixed-top">
	
			<div class="container-fluid">
		
				<div class="navbar-header">
				
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navCollapse">
					
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					
					</button>
				
					<a class="navbar-brand" href="user_main.php">SellIt</a>
				
				</div>
		
				<div class="collapse navbar-collapse" id="navCollapse">
			
					<ul class="nav navbar-nav navbar-right">
			
						<li><a href="#"><span class="glyphicon glyphicon-user"></span> My account</a></li>
				
						<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
				
						<li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			
					</ul>
			
					<form class="navbar-form navbar-right">
			
						<div class="form-group">
				
							<input type="text" class="form-control" placeholder="Search SellIt">
				
						</div>
				
						<div class="form-group dropdown">
			
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Choose a category <span class="caret"></span></button>
				
							<ul class="dropdown-menu" role="menu">
						
								<li class="dropdown-header"><a href="#">All categories</a></li>
						
								<li class="divider"></li>
				
								<li class="dropdown-header"><a href="#">Auto, moto si ambarcatiuni</a></li>
								<li><a href="#">Autoturisme</a></li>
								<li><a href="#">Motociclete - Scutere - ATV</a></li>
								<li><a href="#">Camioane - Rulote - Remorci</a></li>
								<li><a href="#">Ambarcatiuni</a></li>
						
								<li class="divider"></li>
						
								<li class="dropdown-header"><a href="#">Electronice si electrocasnice</a></li>
								<li><a href="#">Telefoane</a></li>
								<li><a href="#">Laptop – Calculator</a></li>
								<li><a href="#">TV - Audio - Video</a></li>
								<li><a href="#">Electrocasnice</a></li>
								<li><a href="#">Aparate Foto - Camere Video</a></li>
						
								<li class="divider"></li>
						
								<li class="dropdown-header"><a href="#">Imobiliare</a></li>
								<li><a href="#">Apartamente - Garsoniere de vanzare</a></li>
								<li><a href="#">Apartamente - Garsoniere de inchiriat</a></li>
								<li><a href="#">Case de vanzare</a></li>
								<li><a href="#">Case de inchiriat</a></li>
								<li><a href="#">Terenuri</a></li>
				
							</ul>
				
						</div>
				
						<button type="submit" class="btn btn-danger">Search</button>
				
					</form>
			
				</div>
			
			</div>
		
		</nav>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
	
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="bootstrap/js/bootstrap.min.js"></script>

	<div class="bkg" style="background-image: url('img/users.jpg'); position:fixed">
		<div class="bkg2"></div>
	</div>
	<h2>Our Community</h2>
	
<form method="post">
		<input type=''text" name="search" placeholder="Search for members..."/>
		<input type="submit" value="GO!"/>
</form>
	
	<?php
	$output='';
//	$fname='';
	//$lname='';
	//$email='';
	if(isset($_POST['search'])){
			$searchque=$_POST['search'];
			//$searchque=preg_replace("#[^0-9a-z]#i","",$searchque); //asta e gen sa ia in considerare doar litere si cifre, i-ul e ca sa ia si litere mari
			$query2="SELECT * FROM users WHERE firstname='$searchque' OR  lastname='$searchque' ";
			$result=mysqli_query($mysqli,$query2);
			$count=mysqli_num_rows($result);
			if($count==0) $output= 'There was no such results';	
									
			
					while($row=mysqli_fetch_array($result))
					{
						$fname=$row['firstname'];
						$lname=$row['lastname'];
						$email=$row['email'];
						$output .='<div> '.$fname.' '.$lname.' '.$email.' </div>';
					

					}
	
	}
	PRINT("$output");
	?>

	
	
	
	
	
	<table class="data-table">
		<thead>
			<tr>
				<th>NO</th>
				<th>FIRSTNAME</th>
				<th>LASTNAME</th>
				<th>EMAIL</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['firstname'].'</td>
					<td>'.$row['lastname'].'</td>
					<td>'.$row['email'].'</td>
				</tr>';
			$no++;
		}
		?>
		</tbody>
	</table>
</body>
</html>