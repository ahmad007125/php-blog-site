<?php 
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
	 $logged = true;
	 $user_id = $_SESSION['user_id'];
    }

  include_once("db_conn.php");
  include_once("admin/data/Post.php");
  include_once("admin/data/Comment.php");
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
 	<h1 class="display-4 mb-4 fs-3" id="blog-category">Blog Category</h1>
  
		<section class="blog-section">

		<!-- <aside class="aside-main"> -->
			<div class="category-aside d-flex flex-row gap-2">
					<a href="blog.php" 
						class="list-group-item list-group-item-action active" 
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
				<h1 class="display-4 mb-4 fs-3">
				<?php 
						if(isset($_GET['search'])){ 
							echo "Search <b>'".htmlspecialchars($_GET['search'])."'</b>"; 
						}?></h1>
				<?php foreach ($posts as $post) { ?>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="card main-blog-card">
					<img src="upload/blog/<?=$post['cover_url']?>" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><?=$post['post_title']?></h5>
						<?php 
							$p = strip_tags($post['post_text']); 
							$p = substr($p, 0, 200);               
						?>
						<p class="card-text"><?=$p?>...</p>
						<a href="blog-view.php?post_id=<?=$post['post_id']?>" class="btn btn-success rounded">Read more</a>
						<div class="d-flex justify-content-between d-none">
							<div class="react-btns">
							<?php 
							$post_id = $post['post_id'];
							if ($logged) {
								$liked = isLikedByUserID($conn, $post_id, $user_id);
							
							
							if($liked){
							?>
							<i class="fa fa-thumbs-up liked like-btn" 
							post-id="<?=$post_id?>"
							liked="1"
							aria-hidden="true"></i>
							<?php }else{ ?>
							<i class="fa fa-thumbs-up like like-btn"
								post-id="<?=$post_id?>"
								liked="0"
								aria-hidden="true"></i>
							<?php } } else{ ?>
							<i class="fa fa-thumbs-up" aria-hidden="true"></i>
							<?php } ?>
						Likes (
					<span><?php 
				echo likeCountByPostID($conn, $post['post_id']);
					?></span> )
							<a href="blog-view.php?post_id=<?=$post['post_id']?>#comments">    
							<i class="fa fa-comment" aria-hidden="true"></i> Comments (
								<?php 
									echo CountByPostID($conn, $post['post_id']);
								?>
								)
							</a>	
							</div>	
							<small class="text-body-secondary"><?=$post['crated_at']?></small>
						</div>	
						
					</div>
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
							<div class="card main-blog-card">
							<img src="upload/blog/<?=$post['cover_url']?>" class="card-img-top" alt="...">
							<div class="card-body">
							<h5 class="card-title"><?=$post['post_title']?></h5>
							<?php 
								$p = strip_tags($post['post_text']); 
								$p = substr($p, 0, 200);               
							?>
							<p class="card-text"><?=$p?>...</p>
							<a href="blog-view.php?post_id=<?=$post['post_id']?>" class="btn btn-success rounded">Read more</a>
							<div class="d-flex justify-content-between d-none">
								<div class="react-btns">
								<?php 
								$post_id = $post['post_id'];
								if ($logged) {
									$liked = isLikedByUserID($conn, $post_id, $user_id);
								
								
								if($liked){
								?>
								<i class="fa fa-thumbs-up liked like-btn" 
								post-id="<?=$post_id?>"
								liked="1"
								aria-hidden="true"></i>
								<?php }else{ ?>
								<i class="fa fa-thumbs-up like like-btn"
									post-id="<?=$post_id?>"
									liked="0"
									aria-hidden="true"></i>
								<?php } } else{ ?>
								<i class="fa fa-thumbs-up" aria-hidden="true"></i>
								<?php } ?>
							Likes (
							<span><?php 
							echo likeCountByPostID($conn, $post['post_id']);
							?></span> )
								<a href="blog-view.php?post_id=<?=$post['post_id']?>#comments">    
								<i class="fa fa-comment" aria-hidden="true"></i> Comments (
									<?php 
										echo CountByPostID($conn, $post['post_id']);
									?>
									)
								</a>	
								</div>	
								<small class="text-body-secondary"><?=$post['crated_at']?></small>
								</div>	
							
							</div>
						</div>
					</div>
				
					<?php } ?>
				</div>
			</main>
			<?php }else {?> 
				<main class="main-blog p-2">
					<div class="alert alert-warning">
						No posts yet.
					</div>
				</main>
			<?php } } ?>
		</section>

    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>