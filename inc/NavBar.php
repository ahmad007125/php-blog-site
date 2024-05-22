
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Your webpage content goes here -->
<script>
      // Function to extract page name from URL
      function getPageName(url) {
          var index = url.lastIndexOf('/') + 1;
          var filenameWithExtension = url.substr(index);
          var pageName = filenameWithExtension.split('.')[0];
          return pageName;
      }
      // Get the current page URL
      var currentPageUrl = window.location.href;

      // Set the title based on the page URL
      var pageTitle = getPageName(currentPageUrl);
      document.title = pageTitle + ' | Resume Builer';
  </script>

	<div class="container-fluid header-container bg-blue p-0" id="header">
        <div class="container">
            <div class="header navigation-bar d-flex justify-content-between align-items-center">
                <!-- <div class="logo">Design<strong>Source</strong></div> -->
                <a class="navbar-brand logo link" href="index.php">
			    	Design<strong>Source</strong>
			    </a>
                <ul class="centered-nav d-flex align-items-center gap-lg-5 gap-md-4 gap-3 mb-0 ps-0 py-1 py-md-0 justify-content-md-center justify-content-around">
                    <li><a aria-current="page" href="index.php" class="link">Home</a></li><span class="y-divider d-md-none d-block"></span>
                    <li><a href="#" class="link">Designs</a></li><span class="y-divider d-md-none d-block"></span>
                    <li><a href="blog.php" class="link">Blog</a></li><span class="y-divider d-md-none d-block"></span>

                    <?php  //if ($logged) { ?>
                    <!-- <li class="nav-item dropdown">
                    	<a class="link dropdown-toggle" href="profile.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	             			<i class="fa fa-user" aria-hidden="true"></i> 
	           		 		@<?=$_SESSION['username']?>
	          			</a>
				        <ul class="dropdown-menu">
				            <li>
				            	<a class="dropdown-item" href="logout.php">Logout</a>
				            </li>
				        </ul>
	      			</li> -->
	      			<?php //} else { ?> 
      				<li class="nav-item"> 
      					<!-- <a class="link" href="login.php">Login | Signup</a> -->
      					<a class="link" href="#">About</a>
        			</li>
	         		<?php //} ?>

                </ul>

                <a href="resume.php" class="btn btn-success rounded">Create CV</a>
            </div>
        </div>
    </div>