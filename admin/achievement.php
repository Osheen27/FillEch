<?php include 'connection.php';
$msg1="";
if(isset($_GET['msg']))
	
{
		
	if($_GET['msg']==1)
		
	{
			
		$msg1 = "Successfully added!";
			
				
	}
		
	else		
	{
		$msg1="Enter All the Entries!";		
	}	
	
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<!-- Font Awesome -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
    <!-- Animation -->
	<link href="css/animate.css" rel="stylesheet" />
	
    <!-- MyTemplate CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="jquery-ui.css">
 
    
</head>


<body>

	<header id="header-banner">
		<nav class="navbar navbar-default navbar-fixed-top fadeIn" role="navigation">
			<div class="container">
				
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#dropdown-box-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="navbar-brand">
						<a href="index.php">BACK</a>
					</div>
				</div>
				
				<!-- Collect the nav links and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="dropdown-box-1">
					
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
					</ul>
					
				</div>
				
			</div> <!-- /.container -->
		</nav> <!-- /.nav -->
	</header>	
	<!-- banner -->
	<!-- aboutus -->
   <section class="aboutus" id="manage_projects">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="wow bounceInLeft" data-wow-delay="0.1s"> 
						<h1>Achievements</h1> 
					</div>
							<div class="col-sm-7">
						 <ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#details">Details</a></li>
										  <li><a data-toggle="tab" href="#add">Add</a></li>
									
										</ul>
										<div class="tab-content">
									
										<div id="details" class="tab-pane fade in active">
										<div class="panel-group">
										<br>
									  <?php $result=$conn->query("select ac_title,ac_details,updated_on,p_name from achievement,project where achievement.p_id=project.p_id");
									if($result->num_rows>0)
									{ 
										$i=1;
										while($row=$result->fetch_assoc())
										{ 
										?> <div class="panel panel-default">
 							   <div class="panel-heading">
      								<h5 class="panel-title">
       				 				<?php echo '<a data-toggle="collapse" href="#'.$i.'">'.$row["ac_title"]."</a>";?>
     							 	</h5>
    							</div>
   
    							<?php echo '<div  class="panel-collapse collapse" id="'.$i.'">';?>
     									<h5><font color="green">Project  :</font><font color="maroon"><?php echo $row['p_name'];?></font></h5>
										<h5><font color="green">Details:</font><font color="maroon"><?php echo $row['ac_details'];?></font></h5>
										
										<h5><font color="green">Updated On: </font><font color="maroon"><?php echo $row["updated_on"];?></font></h5>	
											<br>
	  							</div>
 										
    							</div>

 										<?php
 										$i++;
 										}   		
									 
									}
									else 
									{
										echo "There are no Achievements!";
									}?>

										   
										 </div>
</div>
										
										  <div id="add" class="tab-pane fade ">
										  	<h4><font color=green><?php echo $msg1?></font></h4>
										    <h3>Add</h3>


										     <form action="add.php" method="post">
											
											<table border="0">
												<tr>
													<td>
														<h5> Project &nbsp;&nbsp;</h5></td>
														<td>
														<select name="p_id">
													<option selected="selected">select project name</option>
													<?php $result1=$conn->query("select * from project");
													if($result1->num_rows>0)
													{
														while($row=$result1->fetch_assoc())
													{
														?>
														<option value="<?php echo $row['p_id']; ?>"><?php echo $row['p_name']; ?></option>
													<?php
  													 }
  													}
  													else 
													{
														echo "There are no running projects!";
													}?>	
													<br>
												
													</select>

													</td>
												</tr>
	                                            
												
												<tr>
													<td>
														<h5>Title : </h5></td>
														<td>
														 <input type="text" name="title" placeholder="Title" size=40></font>
														</td>
												</tr>
													
												<tr>
													<td>
														<h5>Details :</h5></td>
														<td><textarea rows="4" cols="40" name="details" type="text" placeholder="Enter details here..."></textarea></font>
														<br><br></td>
												</tr>
												
												<tr>
													<td><input type="submit" name="submit1" value="Add Achievement"></td>
												</tr>
											</table>

											<br>
									
											</form>
										  </div>
									  </div>
						 </div>
					</div>
				</div>				
			</div>
		</div>
	</section>
	
	</section>						
	<!-- Core JavaScript Files -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>			<!-- Reveal animation when you scroll by wow.js. It need animate.css library -->
	<!-- Custom Theme JavaScript -->
	<script src="js/custom.js"></script>

</body>

</html>