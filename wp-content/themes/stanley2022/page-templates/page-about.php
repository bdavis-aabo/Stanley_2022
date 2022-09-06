<?php /* Template Name: Page - About */ ?>

<?php get_header(); ?>

	<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<section class="page-section page-heroimage">
		<div class="about-heroimage">
      <img src="<?php bloginfo('template_directory') ?>/assets/images/about1.png" alt="<?php echo $_lgImage['alt'] ?>" class="abouthero-img img-fluid" />
			<img src="<?php bloginfo('template_directory') ?>/assets/images/about2.png" alt="<?php echo $_lgImage['alt'] ?>" class="abouthero-img even img-fluid" />
			<img src="<?php bloginfo('template_directory') ?>/assets/images/about3.png" alt="<?php echo $_lgImage['alt'] ?>" class="abouthero-img img-fluid" />
			<img src="<?php bloginfo('template_directory') ?>/assets/images/about4.png" alt="<?php echo $_lgImage['alt'] ?>" class="abouthero-img even img-fluid" />
    </div>
		<img src="<?php bloginfo('template_directory') ?>/assets/images/down-arrow.svg" alt="up arrow" class="down-arrow" />
	</section>

	<section class="page-section page-content-section">
		<div class="page-content-container about-content-container">
			<?php the_content(); ?>
		</div>
	</section>

	<?php if(have_rows('secondary_content_section')): while(have_rows('secondary_content_section')): the_row();
		$_image = get_sub_field('image');
	?>
	<section class="page-section page-secondary-section">
		<div class="page-content-container about-secondary-container">
			<div class="left-column">
				<figure class="left-column-image">
					<img src="<?php echo $_image['url'] ?>" class="img-fluid" alt="<?php echo $_image['alt'] ?>" />
				</figure>
				<?php /*
				<div class="video-callout">
					<div class="left-callout">
						<p>See how some of our originals joined the team</p>
					</div>
					<div class="right-callout">
						<button class="btn outline-btn" data-target="#videoPopup">
							Play Video <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/right-arrow.svg') ?>
						</button>
					</div>
				</div>
				*/ ?>
			</div>
			<div class="right-column">
				<h2>
					We're more than a marketplace.<br/>
					<span class="dkgray-txt" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2500" data-aos-offset="50">We're a community of like-minded people that are</span><br/>
					<span class="black-txt" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2500" data-aos-offset="150">here for</span><br/>
					<span class="red-txt" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2500" data-aos-offset="300">good</span>
				</h2>
			</div>
		</div>
	</section>
	<?php endwhile; endif; // end secondary section ?>

	<?php if(get_field('what_makes_stanley') != ''): ?>
	<section class="page-section page-stanifesto-section">
		<div class="page-content-container stanifesto-container">
			<div class="stanifesto-content gray-bg">
				<article class="stanifesto-intro">
					<?php echo get_field('what_makes_stanley'); ?>
					<a href="/stanifesto" title="<?php bloginfo('name') ?> - Events" class="btn blank-btn white-btn">
						The Stanifesto <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/right-arrow.svg') ?>
					</a>
				</article>
			</div>
			<div class="stanifesto-bolts">
				<img src="<?php bloginfo('template_directory') ?>/assets/images/bolts.png" alt="What Makes Stanley" class="img-fluid bolts-image" />
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if(have_rows('aurora')): ?>
	<section class="page-section page-aurora-section">
		<div class="page-content-container aurora-content-container">
			<?php while(have_rows('aurora')): the_row(); $_image = get_sub_field('image'); ?>
			<div class="aurora-left">
				<figure class="aurora-image">
					<img src="<?php echo $_image['url'] ?>" alt="Aurora, Colorado" class="img-fluid" />
				</figure>
			</div>
			<div class="aurora-right">
				<?php echo get_sub_field('content') ?>
			</div>
		<?php endwhile; ?>
		</div>
	</section>
	<?php endif; ?>

	<?php if(have_rows('history')): ?>
	<section class="page-section page-history-section">
		<div class="page-content-container page-history-container">
			<?php while(have_rows('history')): the_row(); $_images = get_sub_field('images'); $_i = 0; ?>
			<div class="history-left">
				<?php echo get_sub_field('content') ?>
			</div>
			<div class="history-right">
				<div class="carousel slide" id="historySlide" data-bs-ride="carousel">
					<div class="carousel-inner">
						<?php $_s = 0; foreach($_images as $_image): ?>
							<div class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>">
								<img src="<?php echo $_image['url'] ?>" alt="Stanley Historical Image" class="img-fluid" />
							</div>
						<?php $_s++; endforeach; ?>
					</div>
					<div class="carousel-indicators">
						<?php foreach($_images as $_image): ?>
						<button data-bs-target="#historySlide" data-bs-slide-to="<?php echo $_i ?>" <?php if($_i == 0): ?>class="active" aria-current="true" <?php endif; ?>></button>
						<?php $_i++; endforeach; ?>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</section>
	<?php endif; ?>

	<section class="page-section page-map-section">
		<div class="map-container">
			<div id="map"></div>
		</div>
	</section>

	<div class="map-directions">
		<h3 class="red-txt">Stanley Marketplace</h3>
		<address>2501 Dallas Street &bull; Aurora, Colorado 80010</address>
		<a href="https://www.google.com/maps?ll=39.753328,-104.891689&z=17&t=m&hl=en-US&gl=US&mapclient=embed&q=2501+Dallas+St+Aurora,+CO+80010" title="<?php bloginfo('name') ?> - Directions" target="_blank" class="btn blank-btn">
			Get Directions <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/right-arrow.svg') ?>
		</a>
	</div>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
