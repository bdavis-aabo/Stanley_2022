<?php
$_today = date('Y-m-d');

$_events = new WP_Query();
$_args = array(
	'post_type' 			=> 'events',
	'post_status' 		=> 'publish',
	'posts_per_page' 	=> 2,
	'order' 					=> 'ASC',
	'meta_query'			=> array(
		array(
			'key'					=> 'event_date',
			'compare'			=> '>=',
			'value'				=> $_today,
		),
		array(
			'meta_key'		=> 'event_date',
			'orderby'			=> 'meta_value_num',
			'order'				=> 'ASC',
		)
	)
);
$_events->query($_args);
?>

	<div class="event-right">
		<?php if($_events->have_posts()): ?>
		<div class="event-container">
			<?php while($_events->have_posts()): $_events->the_post();
				$_image = get_field('event_image');
				$_imageUrl = $_image['sizes']['thumbnail'];
			?>
			<article class="event" id="<?php echo 'event-' . $post->ID ?>">
				<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
					<img src="<?php echo $_imageUrl ?>" class="img-fluid thumbnail" alt="<?php the_title(); ?>"/>
				</a>
				<h2><?php the_title(); ?></h2>
				<a href="<?php the_permalink() ?>" class="btn arrow-btn" title="<?php the_title(); ?>">
					Learn More <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/right-arrow.svg') ?>
				</a>
			</article>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
