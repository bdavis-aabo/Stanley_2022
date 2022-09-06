<?php
	$_recentPost = new WP_Query();
	$_args = array(
	  'post_type' 			=> 'post',
	  'post_status' 		=> 'publish',
	  'posts_per_page' 	=> 1,
	  'order' 					=> 'DESC',
	  'orderby' 				=> 'date'
	);
	$_recentPost->query($_args);
?>

<?php if($_recentPost->have_posts()): ?>
<section class="homepage-section homepage-article-section">
	<div class="article-container">
		<h2>
			Latest and Greatest<br/>
			<em>Stanley News</em>
		</h2>
		<?php while($_recentPost->have_posts()): $_recentPost->the_post(); ?>
		<article id="post-<?php echo $post->ID ?>" class="recent-article">
			<div class="article-contents">
				<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="article-title">
					<?php the_title() ?>
				</a>
				<?php the_excerpt('') ?>

				<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="btn arrow-btn">
					Read More <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/right-arrow.svg') ?>
				</a>
			</div>
			<figure class="article-image">
				<?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid')); ?>
			</figure>
		</article>
		<?php endwhile; ?>
	</div>
</section>
<?php endif; wp_reset_query(); ?>
