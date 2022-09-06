<?php
	$_shops = new WP_Query();
	$_args = array(
		'post_type' 			=> 'businesses',
		'post_status' 		=> 'publish',
		'posts_per_page' 	=> -1,
		'order' 					=> 'ASC',
		'orderby' 				=> 'title',
		'tax_query'				=> array(
			array(
				'taxonomy'			=> 'marketplace',
				'field'					=> 'slug',
				'terms'					=> $post->post_name
			)
		)
	);
	$_shops->query($_args);
?>

	<?php if($_shops->have_posts()): ?>
	<section class="page-section shop-listing-section">
		<div class="shop-listing-container">
			<?php while($_shops->have_posts()): $_shops->the_post();
				$_terms = get_the_terms($post->ID, 'channel');
				$_termsString = join(', ', wp_list_pluck($_terms, 'name'));
			?>
			<article class="shop" id="<?php echo $post->post_name . '-shop' ?>">
				<?php if(get_field('business_thumbnail')): $_lgImage = get_field('business_thumbnail') ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<figure class="shop-image">
						<img src="<?php echo $_lgImage['url'] ?>" class="img-fluid" alt="<?php the_title() ?>" />
					</figure>
				</a>
				<?php endif; ?>
				<div class="shop-info">
					<div class="shop-info-left">
						<span class="shop-category red-txt"><?php echo $_termsString ?></span><br />
						<h2 class="shop-name"><?php the_title() ?></h2>
					</div>
					<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="btn outline-btn red-arrow">
						<?php echo file_get_contents(get_template_directory_uri() . '/assets/images/right-arrow.svg') ?>
					</a>
				</div>
			</article>
			<?php endwhile; ?>
		</div>
	</section>
	<?php endif; ?>
