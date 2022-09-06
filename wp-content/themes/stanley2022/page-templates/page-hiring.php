<?php /* Template Name: Page - Hiring */ ?>

<?php get_header(); ?>

	<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<section class="page-section page-content-section">
			<div class="page-content-container about-content-container">
				<?php the_content(); ?>
			</div>
		</section>

		<?php if(have_rows('job_posting')): ?>
			<section class="page-section page-content-section">
				<div class="page-content-container hiring-content-container">
					<?php while(have_rows('job_posting')): the_row(); ?>
					<article class="job-posting">
						<h3 class="posting-title">
							<?php echo get_sub_field('business_name') ?><br/>
							<em><?php echo get_sub_field('position_title'); ?></em>
						</h3>
						<?php echo get_sub_field('position_description') ?>
					</article>
					<?php endwhile; ?>
				</div>
			</section>
		<?php endif; ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
