<?php get_header(); ?>

	<?php if(have_posts()): while(have_posts()): the_post();
	$_image = get_field('event_image');
	$_imageUrl = $_image['sizes']['thumbnail'];
		?>
<?php /*
		<section class="page-section page-heroimage">
			<picture class="page-heroimage">
				<source media="(max-width: 520px)" srcset="<?php bloginfo('template_directory') ?>/assets/images/events-mobile.jpg">
				<img src="<?php bloginfo('template_directory') ?>/assets/images/events-heroimage.jpg" alt="Stanley Events" class="pagehero-img img-fluid" />
			</picture>
			<img src="<?php bloginfo('template_directory') ?>/assets/images/down-arrow.svg" alt="up arrow" class="down-arrow" />
		</section>
*/ ?>

		<section class="page-section single-event-section">
			<div class="page-content-container event-content-container">
				<article class="event">
					<div class="event-left">
						<img src="<?php echo $_imageUrl ?>" class="img-fluid" alt="<?php the_title(); ?>" />
					</div>
					<div class="event-right">
						<h1 class="black-txt"><?php the_title() ?></h1>
						<?php the_content(); ?>
					</div>
				</article>
			</div>
		</section>
		<?php endwhile; endif; ?>

<?php get_footer(); ?>
