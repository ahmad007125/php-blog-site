<!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="blog.php">
    	<b>My<span style="color: #0088FF;">Blog</span>
    	</b>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blog.php">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" 
             href="category.php">
             Category</a>
        </li>
      </ul>
      <form class="d-flex" 
             role="search"
             method="GET"
             action="blog.php">
        <input class="form-control me-2" 
               type="search"
               name="search" 
               placeholder="Search" 
               aria-label="Search">

        <button class="btn btn-outline-success" 
                type="submit">
                Search</button>
      </form>
    </div>
  </div>
</nav> -->


	<div class="container-fluid header-container bg-blue p-0" id="header">
        <div class="container">
            <div class="header navigation-bar d-flex justify-content-between align-items-center">
                <!-- <div class="logo">Design<strong>Source</strong></div> -->
                <a class="navbar-brand logo" href="index.php">
			    	Design<strong>Source</strong>
			    </a>
                <ul class="centered-nav d-flex align-items-center gap-lg-5 gap-md-4 gap-3 mb-0 ps-0 py-1 py-md-0 justify-content-md-center justify-content-around">
                    <li><a aria-current="page" href="index.php" class="link">Home</a></li><span class="y-divider d-md-none d-block"></span>
                    <li><a href="#" class="link">Designs</a></li><span class="y-divider d-md-none d-block"></span>
                    <li><a href="blog.php" class="link">Blog</a></li><span class="y-divider d-md-none d-block"></span>

                    <?php  if ($logged) { ?>
                    <li class="nav-item dropdown">
                    	<a class="link dropdown-toggle" href="profile.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	             			<i class="fa fa-user" aria-hidden="true"></i> 
	           		 		@<?=$_SESSION['username']?>
	          			</a>
				        <ul class="dropdown-menu">
				            <li>
				            	<a class="dropdown-item" href="logout.php">Logout</a>
				            </li>
				        </ul>
	      			</li>
	      			<?php } else { ?> 
      				<li class="nav-item"> 
      					<a class="nav-link" href="login.php">Login | Signup</a>
        			</li>
	         		<?php } ?>

                </ul>

                <a href="resume.html" class="btn btn-success rounded">Create CV</a>
            </div>
        </div>
    </div>