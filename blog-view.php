<?php 
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
	 $logged = true;
	 $user_id = $_SESSION['user_id'];
}

if (isset($_GET['post_id'])) {

   	  include_once("admin/data/Post.php");
        // include_once("admin/data/Comment.php");
        include_once("db_conn.php");
        $id = $_GET['post_id'];
        $post = getById($conn, $id);
        // $comments = getCommentsByPostID($conn, $id);
        // $categories = get5Categoies($conn); 

     if ($post == 0) {
     	  header("Location: blog.php");
	     exit;
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog - <?=$post['post_title']?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php 
        include 'inc/NavBar.php';
      ?>
    
   <div class="container mt-5">
		<section class="d-flex">

	  	   <main class="main-blog">
		  	   <div class="card main-blog-card mb-5">
				 	<h5 class="card-title"><?=$post['post_title']?></h5>
					<p class="text"><?=$post['post_intro']?></p>
				    <img src="upload/blog/<?=$post['cover_url']?>" class="card-img-top" alt="...">
				    <div class="card-body">
				    	<p class="card-text"><?=$post['post_text']?></p>     
			  		</div>
				</div>
			</main>

			<aside class="aside-main d-none">
			   <div class="list-group category-aside">
				  <a href="#" class="list-group-item list-group-item-action" aria-current="true">
				    Category
				  </a>
				  <?php foreach ($categories as $category ) { ?>
				  <a href="category.php?category_id=<?=$category['id']?>"
				     class="list-group-item list-group-item-action">
				  	<?php echo $category['category']; ?>
				  </a>
				  <?php } ?>
				</div>
			</aside>

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

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
   	<!-- <script>
   	 $(document).ready(function(){
			  $(".like-btn").click(function(){
			     var post_id = $(this).attr('post-id');
			     var liked = $(this).attr('liked');

			     if (liked == 1) {
                 $(this).attr('liked', '0');
                 $(this).removeClass('liked');
			     }else {
                 $(this).attr('liked', '1');
                 $(this).addClass('liked');
			     }
			     $(this).next().load("ajax/like-unlike.php",
			     	{
			     		post_id: post_id
			     	});
			  });
		  });
   	</script> -->

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>
<?php }else {
	header("Location: blog.php");
	exit;
} ?>