<?php /* Template Name: Page - Homepage */ ?>

<?php get_header(); ?>

	<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<section class="homepage-section homepage-heroimage">
		<?php if(get_field('large_image')):
			$_lgImage = get_field('large_image'); $_mobImage = get_field('mobile_image'); ?>
		<div class="heroimage-container dkblue-bg">
			<div class="heroimage-graphic-text">
				<img src="<?php bloginfo('template_directory') ?>/assets/images/for-good.svg" alt="For Good Graphic" class="img-fluid" />
				<div class="slider" id="homepageHeroSlider">
					<div class="slide-words">
						<h2 class="outline-text">Vibes</h2>
					</div>
					<div class="slide-words">
						<h2 class="outline-text">Times</h2>
					</div>
					<div class="slide-words">
						<h2 class="outline-text">Community</h2>
					</div>
					<div class="slide-words">
						<h2 class="outline-text">WiFi</h2>
					</div>
					<div class="slide-words">
						<h2 class="outline-text">Drinks</h2>
					</div>
					<div class="slide-words">
						<h2 class="outline-text">Mindspace</h2>
					</div>
					<div class="slide-words">
						<h2 class="outline-text">Food</h2>
					</div>
				</div>
				<?php /*
				<button class="btn blank-btn white-btn" data-target="#homepageVideo">
					Play Video <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/right-arrow.svg') ?>
				</button>
				*/ ?>
			</div>
		</div>
		<div class="homepage-graphic">
			<img src="<?php bloginfo('template_directory') ?>/assets/images/homepage-graphic.png" class="img-fluid" />
		</div>
		<?php endif; ?>
		<img src="<?php bloginfo('template_directory') ?>/assets/images/down-arrow.svg" alt="up arrow" class="down-arrow" />
	</section>

	<section class="homepage-section homepage-content-section white-bg">
		<div class="homepage-content-container">
			<article class="homepage-content">
				<?php the_content(); ?>
				<a href="/about" class="btn arrow-btn" title="About <?php bloginfo('name') ?>">
					About <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/right-arrow.svg') ?>
				</a>
			</article>
		</div>

		<?php if(have_rows('marketplace_categories')): ?>
		<div class="homepage-content-secondary">
			<div class="secondary-left">
				<?php while(have_rows('marketplace_categories')): the_row(); $_image = get_sub_field('image'); ?>
				<a href="<?php echo get_sub_field('link') ?>" class="marketplace-type">
					<figure class="marketplace-image">
						<img src="<?php echo $_image['url'] ?>" alt="<?php echo get_sub_field('title') . ' for good'; ?>" class="img-fluid" />
					</figure>
					<span class="marketplace-type-title">
						<?php echo get_sub_field('title') ?><br />
						<?php echo file_get_contents(get_template_directory_uri() . '/assets/images/right-arrow.svg') ?>
					</span>
				</a>
				<?php endwhile; ?>
			</div>
			<div class="secondary-right">
				<div class="marketplace-icon">
					<?php echo file_get_contents(get_template_directory_uri() . '/assets/images/coffee-icon_anim.svg') ?>
				</div>
				<?php echo get_field('marketplace_content') ?>
			</div>
		</div>
		<?php endif; ?>
	</section>

	<?php if(get_field('event_content')): ?>
	<section class="homepage-section homepage-event-section gray-bg">
		<div class="event-section-container">
			<div class="marketplace-icon">
				<?php echo file_get_contents(get_template_directory_uri() . '/assets/images/album-icon_anim.svg') ?>
			</div>
			<div class="event-left">
				<?php echo get_field('event_content') ?>
				<a href="/stanley-events" title="<?php bloginfo('name') ?> - Events" class="btn blank-btn white-btn">
					View all events <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/right-arrow.svg') ?>
				</a>
			</div>
			<?php get_template_part('home/home-events'); ?>
		</div>
	</section>
	<?php endif; ?>

	<section class="homepage-section homepage-venue-section red-bg">
		<div class="venue-container">
			<h2 class="white-txt">Venues at Stanley</h2>
			<p>
				Learn about various venues throughout Stanley Marketplace and book your private event.
				<a href="/businesses/stanley-venues/" title="Venues at Stanley" class="arrow-link">
					<?php echo file_get_contents(get_template_directory_uri() . '/assets/images/right-arrow.svg') ?>
				</a>
			</p>
		</div>
	</section>

	<?php get_template_part('home/home-news') ?>
	<?php get_template_part('home/home-gallery') ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
