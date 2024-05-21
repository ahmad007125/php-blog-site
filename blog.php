<?php 
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
	 $logged = true;
	 $user_id = $_SESSION['user_id'];
    }

  include_once("db_conn.php");
  include_once("admin/data/Post.php");
//   include_once("admin/data/Comment.php");
  if(isset($_GET['search'])){
	$key = $_GET['search'];
	$posts = serach($conn, $key);
	if ($posts == 0) {
			$notFound = 1;
	}
	}else {
	$posts = getAll($conn);
	}
  
  $categories = getAllCategories($conn);
  $categories5 = get5Categoies($conn); 
  $category = 0;
 ?>
 <?php 
     include 'inc/NavBar.php';
  ?>
 <div class="container mt-5">
		<div class="col-lg-7 col-sm-10 col-xs-10 mx-auto">
			<div class="my-5 text-center">
				<h2 class="mb-2">Blog Categories</h2>
				<p>Blog categories help organize your content, making it easier for readers to find related posts and enhancing the overall user experience on your site.</p>
			</div>
		</div>
  
		<section class="blog-section">

			<!-- <aside class="aside-main"> -->
			<div class="category-aside d-flex flex-row gap-2 mb-5">
				<a href="blog.php" 
					class="list-group-item list-group-item-action" 
					aria-current="true">
					All
				</a>
				<?php //foreach ($categories5 as $category ) { ?>
					<?php foreach ($categories as $category ) { ?>
				<a href="blog.php?category_id=<?=$category['id']?>" 
					class="list-group-item list-group-item-action">
					<?php echo $category['category']; ?>
				</a>
				<?php } ?>
			</div>
			<!-- </aside> -->
			<?php if (!isset($_GET['category_id'])) { ?>
			<main class="main-blog">
				<div class="row">
					<?php 
						if(isset($_GET['search'])){ 
							echo "Search <b>'".htmlspecialchars($_GET['search'])."'</b>"; 
						}?></h1>
				<?php foreach ($posts as $post) { ?>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="card main-blog-card p-4">
							<div class="card-body p-0">
								<h5 class="card-title"><?=$post['post_title']?></h5>
								<?php 
									$p = strip_tags($post['post_text']); 
									$p = substr($p, 0, 200);               
								?>
								<p class="card-text"><?=$p?>...</p>
								<a href="blog-view.php?post_id=<?=$post['post_id']?>" class="btn btn-link p-0">
									Read more
									<span class="ms-1">
										<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
										<svg fill="currentColor" height="13px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
											viewBox="0 0 242.133 242.133" xml:space="preserve">
											<path id="XMLID_24_" d="M190.919,212.133h-69.853c-8.284,0-15,6.716-15,15s6.716,15,15,15h106.065c8.284,0,15-6.716,15-15V121.066
											c0-8.284-6.716-15-15-15s-15,6.716-15,15v69.854L25.607,4.394c-5.858-5.858-15.356-5.858-21.213,0
											c-5.858,5.858-5.858,15.356,0,21.213L190.919,212.133z"/>
										</svg>
									</span>
								</a>
								
							</div>
							<img src="upload/blog/<?=$post['cover_url']?>" class="card-img-top" alt="...">
						</div>
					</div>
				<?php } ?>
				</div>
			</main>
			<?php }else{
			$cId = $_GET['category_id'];
			$posts = getAllPostsByCategory($conn, $cId);
			?>
			<?php if ($posts != 0) { ?>
			<main class="main-blog">
				<div class="row">
					<?php foreach ($posts as $post) { ?>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<div class="card main-blog-card p-4">
								<div class="card-body p-0">
									<h5 class="card-title"><?=$post['post_title']?></h5>
									<?php 
										$p = strip_tags($post['post_text']); 
										$p = substr($p, 0, 200);               
									?>
									<p class="card-text"><?=$p?>...</p>
									<a href="blog-view.php?post_id=<?=$post['post_id']?>" class="btn btn-link p-0">Read more
										<span class="ms-1">
											<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
											<svg fill="currentColor" height="13px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
												viewBox="0 0 242.133 242.133" xml:space="preserve">
											<path id="XMLID_24_" d="M190.919,212.133h-69.853c-8.284,0-15,6.716-15,15s6.716,15,15,15h106.065c8.284,0,15-6.716,15-15V121.066
												c0-8.284-6.716-15-15-15s-15,6.716-15,15v69.854L25.607,4.394c-5.858-5.858-15.356-5.858-21.213,0
												c-5.858,5.858-5.858,15.356,0,21.213L190.919,212.133z"/>
											</svg>
										</span>
									</a>	
								
								</div>
								<img src="upload/blog/<?=$post['cover_url']?>" class="card-img-top" alt="...">
							</div>
						</div>
				
					<?php } ?>
				</div>
			</main>
			<?php }else {?> 
				<main class="main-blog p-2 d-flex justify-content-center">
					<div class="default-screen px-5 py-0 col-lg-8 col-sm-10 col-xs-12">
						<img src="images/blog-not-found.svg" class="img-fluid">
						<h4 class="mt-5 mb-3">No Post Found!</h4>
						<p class="">No Post Found! signifies that your search criteria didn't match any posts. Please consider exploring our full collection of posts on the 'All Posts' or 'Blog' page to find relevant content.</p>
						<a href="blog.php" class="btn btn-success">All posts</a>
					</div>
				</main>
			<?php } } ?>
		</section>
    </div>

	<div class="container-fluid sixth-container call-container bg-img px-0">
		<div class="container py-3">
			<div class="row align-items-center py-4 py-md-5 justify-content-center">
				<div class="col-lg-7 col-md-10 col-sm-12 px-4 px-sm-0 captions-col text-center">
					<h1 class="text-white mb-4">Ready to design your dream CV?</h1>
					<p class="font-sm text-white mb-4">Unlocking Your Professional Potential: Elevating Careers with Customized CV Solutions. Your Journey to Success Starts Now.</p>
					<a href="resume.php" class="btn btn-success rounded">Create CV</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid seventh-container footer-container bg-blue px-0">
		<div class="container py-3 py-md-4">
			<div class="d-flex justify-content-center justify-content-md-between gap-3 py-1 flex-wrap flex-md-nowrap">
				<p class="mb-0 text-white">© 2024 MyResume All rights reserved.</p>
				<div class="d-flex gap-4">
					<a href="#" class="text-white link">Privacy policy</a>
					<a href="#" class="text-white link">Terms of use</a>
				</div>
			</div>
		</div>
	</div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/custom.js"></script>

	<script>

		// document.addEventListener('DOMContentLoaded', function() {
		// 	$(window).load(function() {
		// 	var categoryItems = document.querySelectorAll('.list-group-item');

		// 	// Function to get the category_id from the URL
		// 	function getCategoryIDFromURL() {
		// 		var urlParams = new URLSearchParams(window.location.search);
		// 		return urlParams.get('category_id');
		// 	}

		// 	var currentCategoryID = getCategoryIDFromURL();

		// 	categoryItems.forEach(function(item) {
		// 		// Add click event to allow page refresh
		// 		item.addEventListener('click', function() {
		// 			categoryItems.forEach(function(el) {
		// 				el.classList.remove('active');
		// 			});
		// 			this.classList.add('active');
		// 		});

		// 		// Check if the item's href contains the current category ID
		// 		var linkHref = item.getAttribute('href');
		// 		var linkCategoryID = new URLSearchParams(linkHref.split('?')[1]).get('category_id');
		// 		if (linkCategoryID === currentCategoryID) {
		// 			item.classList.add('active');
		// 		}
		// 	});
		// });

	document.addEventListener('DOMContentLoaded', function() {
		var categoryItems = document.querySelectorAll('.list-group-item');
		// Function to get the category_id from the URL
		function getCategoryIDFromURL() {
			var urlParams = new URLSearchParams(window.location.search);
			return urlParams.get('category_id');
		}
		var currentCategoryID = getCategoryIDFromURL();
		// console.log('Current Category ID from URL:', currentCategoryID); // Debugging
		categoryItems.forEach(function(item) {
			// Check if the item's href contains the current category ID
			var linkHref = item.getAttribute('href');
			// console.log('Item href:', linkHref); // Debugging
			if (linkHref) {
				var linkCategoryID = new URLSearchParams(linkHref.split('?')[1]).get('category_id');
				// console.log('Link Category ID:', linkCategoryID); // Debugging
				// If linkCategoryID matches currentCategoryID, add 'active' class
				if (linkCategoryID == currentCategoryID) {
					item.classList.add('active');
				}
			}
			// Add click event to allow page refresh
			item.addEventListener('click', function() {
				categoryItems.forEach(function(el) {
					el.classList.remove('active');
				});
				this.classList.add('active');
			});
		});
	});


	</script>
</body>
</html>