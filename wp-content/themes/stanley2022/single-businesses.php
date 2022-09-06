<?php get_header(); ?>

	<?php
		$_terms = get_the_terms($post->ID, 'marketplace');
		foreach($_terms as $_term):
			$_cat = $_term->slug;
		endforeach;
	?>

	<section class="business-section business-back-section">
		<div class="business-content-container">
			<a href="/<?php echo $_cat ?>" title="back to marketplace shops" class="back-btn">
				<?php echo file_get_contents(get_template_directory_uri() . '/assets/images/left-arrow.svg') ?> Back to stanley marketplace shops
			</a>
		</div>
	</section>

	<?php if(have_posts()): while(have_posts()): the_post(); $_images = get_field('business_gallery'); $_logo = get_field('business_logo'); ?>
	<section class="business-section business-detail-section">
		<div class="business-detail-container">
			<?php if($_images): $_s = 0; ?>
			<div id="businessGallery" class="carousel slide business-gallery" data-bs-ride="carousel">
				<div class="carousel-inner">
					<?php foreach($_images as $_image): ?>
					<div class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>">
						<img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['alt'] ?>" class="img-fluid" />
					</div>
					<?php $_s++; endforeach; ?>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#businessGallery" data-bs-slide="prev">
					<i class="fas fa-chevron-left"></i>
					<span class="visually-hidden">previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#businessGallery" data-bs-slide="next">
					<i class="fas fa-chevron-right"></i>
					<span class="visually-hidden">next</span>
				</button>
			</div>
			<?php endif; ?>
			<div class="business-description">
				<div class="business-description-container">
					<img src="<?php echo $_logo['url'] ?>" alt="<?php the_title() ?>" class="img-fluid" />
					<?php the_content() ?>
				</div>
			</div>
		</div>
	</section>

	<?php if(have_rows('business_questions')): ?>
	<section class="business-section business-question-section">
		<div class="business-question-container">
			<div class="accordion" id="businessAccordion">
			<?php $_a = 0; while(have_rows('business_questions')): the_row(); ?>
				<div class="accordion-item">
					<h2 class="accordion-header" id="<?php echo 'heading' . $_a; ?>">
						<button class="accordion-button <?php if($_a > 0): echo 'collapsed'; endif; ?>" type="button" data-bs-toggle="collapse" data-bs-target="<?php echo '#collapse' . $_a ?>" data-bs-parent="#businessAccordion">
							<?php echo get_sub_field('question') ?>
						</button>
					</h2>
					<div id="collapse<?php echo $_a ?>" class="accordion-collapse collapse <?php if($_a == 0): echo 'show'; endif; ?>">
						<div class="accordion-body">
							<?php echo get_sub_field('answer'); ?>
						</div>
					</div>
				</div>
			<?php $_a++; endwhile; ?>
			</div>
		</div>
	</section>
	<?php endif; //end business questions ?>

	<section class="business-section business-contact-section">
		<div class="business-contact-container">
			<?php if(get_field('business_hours')): ?>
			<div class="business-hours">
				<p><strong>Hours</strong></p>
				<?php echo get_field('business_hours') ?>
			</div>
			<?php endif; ?>
			<div class="business-contact">
				<?php while(have_rows('business_links')): the_row(); ?>
					<?php if(get_sub_field('website') != ''): ?>
					<div class="contact-left">
						<a href="<?php echo get_sub_field('website') ?>" title="<?php the_title() ?> - website" target="_blank" class="btn outline-btn">
							view website <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/right-arrow.svg') ?>
						</a>
					</div>
					<?php endif; ?>
					<div class="contact-right">
						<ul class="socials">
							<?php if(get_sub_field('facebook') != ''): ?>
								<li class="social"><a href="<?php echo get_sub_field('facebook') ?>" class="red-txt" target="_blank"><i class="fab fa-facebook"></i></a></li>
							<?php endif; ?>
							<?php if(get_sub_field('instagram') != ''): ?>
								<li class="social"><a href="<?php echo get_sub_field('instagram') ?>" class="red-txt" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<?php endif; ?>
							<?php if(get_sub_field('twitter') != ''): ?>
								<li class="social"><a href="<?php echo get_sub_field('twitter') ?>" class="red-txt" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<?php endif; ?>
							<?php if(get_sub_field('tiktok') != ''): ?>
								<li class="social"><a href="<?php echo get_sub_field('tiktok') ?>" class="red-txt" target="_blank"><i class="fab fa-tiktok"></i></a></li>
							<?php endif; ?>
						</ul>
					</div>
				<?php endwhile; ?>

				<?php if(get_field('business_phone') != ''): ?>
				<div class="contact-bottom">
					<a href="tel:<?php echo get_field('business_phone') ?>" class="btn outline-btn">
						<?php echo get_field('business_phone') ?> <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/right-arrow.svg') ?>
					</a>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php endwhile; endif; ?>

<?php get_footer(); ?>
