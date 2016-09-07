<?php
require_once ('includes/db.php');

?>

<!DOCTYPE html>
<html lang="en" ng-app="bbook">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/main_icon.jpg">

  <title>Bounce Book</title>

  <!-- Bootstrap core CSS -->
  <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Styles -->
  <link href="css/main.css" rel="stylesheet">
  <link href="node_modules/select2/dist/css/select2.min.css" rel="stylesheet">

  <!-- For the return to top arrow on the progressions page -->
  <!-- <script src="https://use.fontawesome.com/aa1a9d6ccd.js"></script> -->
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
</head>

<body>
  <nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
    <a class="navbar-brand" href="#/">
      <!-- <img src="images/main_icon.jpg" style="height:100%;display:inline-block;vertical-align:baseline;" alt=""> -->
      Bounce Book
    </a>
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#/">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#browse/all">Skills</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#progressions">Progressions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#tree">Tree</a>
      </li>
      <?=($loggedIn)?
        '<li class="nav-item">
          <span class="nav-link">|</span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#add">Add skill</a>
        </li>':'';
      ?>
    </ul>

    <ul class="nav navbar-nav pull-right">
        <!-- Show login link or user's name -->
      <?=($loggedIn)?
        '<li class="hello nav-item" title="This is not a link">
          Hello '.$loggedIn.' :)
        </li>
        <li class="nav-item">
          <a class="nav-link" href="includes/process_login.php">Logout</a>
        </li>
        ':
        // Else
        '<li class="nav-item">
          <a class="nav-link" href="" onClick="return false;" data-toggle="modal" data-target="#login-modal">Login</a>
        </li>';
      ?>
    </ul>
  </nav>


  <?php include 'pages/login_modal.html'; ?>

  <div class="container">
  	<div class="row">

  		<!-- Main content -->
  		<div class="main">
        <!-- Return to top arrow -->
        <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>

  			<div class="page" ng-view>



  			</div>
  		</div>
  	</div>
  </div>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script> -->
  <!-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script> -->
  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/bootstrap/node_modules/tether/dist/js/tether.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- Angular
  ======================================================= -->
  <script src="node_modules/angular/angular.js"></script>
  <script src="node_modules/angular-route/angular-route.js"></script>
  <script src="node_modules/angular-animate/angular-animate.js"></script>

  <!-- Mine & MSC
  ======================================================= -->
  <script src="js/bbook.js"></script>

  <script src="node_modules/select2/dist/js/select2.min.js"></script>
  <script src="node_modules/autosize/dist/autosize.min.js"></script>
  <script src="plugins/cytoscape/cytoscape.min.js"></script>

  <script>
  	// On mobile, close the navbar when a link is clicked
  	// $('.navbar-nav li a').click(function () {
  	// 	if ($('.navbar-collapse').hasClass('in'))
  	// 	    $(".navbar-toggle").click();
  	// });

    // Add active class to currently clicked nav item
    $("nav .navbar-nav .nav-item").click(function() {
      $(this).parent().children().removeClass('active');
      $(this).addClass('active');
    });


    // ===== Scroll to Top ====
    var scrollTrigger = 150; // px
    var returnToTopElement = $('#return-to-top');
    backToTop = function () {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > scrollTrigger) {
            $('#return-to-top').addClass('show');
        } else {
            $('#return-to-top').removeClass('show');
        }
    };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#return-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
  </script>

</body>

</html>