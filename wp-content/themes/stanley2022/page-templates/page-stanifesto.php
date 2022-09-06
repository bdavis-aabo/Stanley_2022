<?php /* Template Name: Page - Stanifesto */ ?>

<?php get_header(); ?>

	<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<section class="page-section page-content-section">
			<div class="page-content-container stanifesto-content-container">
				<?php the_content(); ?>
			</div>
		</section>
	<?php endwhile; endif; ?>

<?php get_footer(); ?>
