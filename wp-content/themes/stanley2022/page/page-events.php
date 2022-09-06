<?php
	$_today = date('Y-m-d');

	$_events = new WP_Query();
	$_args = array(
	  'post_type' 			=> 'events',
	  'post_status' 		=> 'publish',
	  'posts_per_page' 	=> -1,
	  'order' 					=> 'ASC'
		// 'meta_query'			=> array(
		// 	array(
		// 		'key'					=> 'event_date',
		// 		'compare'			=> '>=',
		// 		'value'				=> $_today,
		// 	),
		// 	array(
		// 		'meta_key'		=> 'event_date',
		// 		'orderby'			=> 'meta_value_num',
		// 		'order'				=> 'ASC',
		// 	)
		// )
	);
	$_events->query($_args);

?>

<?php if($_events->have_posts()): ?>
<section class="page-section event-list-section">
	<div class="event-list-container">
	<?php while($_events->have_posts()): $_events->the_post();
		$_image = get_field('event_image');
		$_imageUrl = $_image['sizes']['thumbnail'];
	?>
		<article class="event" id="event-<?php echo $post->ID ?>">
			<img src="<?php echo $_imageUrl ?>" class="img-fluid" alt="<?php the_title(); ?>" />
			<h2><?php the_title(); ?></h2>
			<a href="<?php the_permalink() ?>" class="btn arrow-btn" title="<?php the_title(); ?>">
				Learn More <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/right-arrow.svg') ?>
			</a>
		</article>
	<?php endwhile; ?>
	</div>
</section>
<?php endif; wp_reset_query(); ?>
