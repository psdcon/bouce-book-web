<?php 
require_once ('includes/db.php');

?>

<!DOCTYPE html>
<html lang="en" ng-app="bbook">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<link rel="shortcut icon" href="images/main_icon.jpg">

	<title>Bounce Book</title>

	<!-- Styles -->
	<link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/dashboard.css" rel="stylesheet">
	<link href="plugins/select2/css/select2.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
</head>

<body>
	<!-- Top navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#/">
					<img src="images/main_icon.jpg" style="height:100%;display:inline-block;vertical-align:baseline;" alt=""> Bounce Book
				</a>
			</div>
			<div class="navbar-collapse collapse">
                <!-- <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form> -->
                <ul class="nav navbar-nav navbar-right">
                	<?php
                	if ($loggedIn){
                		echo '
                		<li class="hello" title="This is not a link">Hello '.$loggedIn.' :)</li>
                		<li><a href="includes/process_login.php">Logout</a></li>
                		';
                	}
                	else {
                		echo '
                		<li>
                			<a href="" onClick="return false;" data-toggle="modal" data-target="#login-modal">Login</a>
                		</li>
                		';
                	}
                	?>
                	<li class="visible-xs-block"><a href="#/">Dashboard</a></li>
                	<li class="visible-xs-block"><a href="#browse/all">Browse</a></li>
                	<li class="visible-xs-block"><a href="#tree">Tree</a></li>
                	<?php
                	if ($loggedIn){
                		echo '
                		<li class="visible-xs-block"><a href="#add"><span class="glyphicon glyphicon-plus"></span> Add skill</a></li>
                		';
                	}
                	?>
                	<!-- <li><a href="#settings">Settings</a></li> -->
                	<!-- <li><a href="#help">Help</a></li> -->
                </ul>
            </div>
        </div>
    </div>

    <?php include 'pages/login_modal.html'; ?>

    <div class="container-fluid">
    	<div class="row">
    		<!-- Sidebar container -->
    		<div class="col-sm-3 col-md-2 sidebar" style="background-color:rgb(51, 51, 51);">
    			<ul class="nav nav-sidebar">
    				<li><a href="#/">Dashboard</a></li>
    				<li><a href="#browse/all">Browse</a></li>
    				<li><a href="#tree">Tree</a></li>
    			</ul>
    			<?php
    			if ($loggedIn){
    				echo '
    				<div class="nav-seperator">Manage</div>
    				<ul class="nav nav-sidebar">
    					<li><a href="#add"><span class="glyphicon glyphicon-plus"></span> Add skill</a></li>
    					<!-- <li><a href="#more">More navigation</a></li> -->
    				</ul>';
    			}
    			?>
    		</div>

    		<!-- Main content -->
    		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    			<div class="page" ng-view>



    			</div>
    		</div>
    	</div>
    </div>

    <!-- JavaScript (Placed at the end of the document so pages load faster)
    ======================================================= -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/angular/angular.js"></script>
    <script src="node_modules/angular-route/angular-route.js"></script>
    <script src="node_modules/angular-animate/angular-animate.js"></script>
    <script src="js/bbook.js"></script>

    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="plugins/select2/js/select2.min.js"></script>
    <script src="plugins/cytoscape/cytoscape.min.js"></script>
    <script src="plugins/autosize/dist/autosize.js"></script>

    <script>
    	// On mobile, close the navbar when a link is clicked
    	$('.navbar-nav li a').click(function () {
    		if ($('.navbar-collapse').hasClass('in'))
    		    $(".navbar-toggle").click();
    	});
    </script>

</body>

</html>