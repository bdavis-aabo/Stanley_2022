<?php get_header(); ?>



	<?php if(have_posts()): ?>
	<section class="page-section news-section single-event-section">
		<div class="page-content-container event-content-container">
			<?php while(have_posts()): the_post(); ?>
			<article class="event news-article single-article" id="<?php echo 'post-' . $post->ID ?>">
				<div class="event-left">
					<?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid')); ?>
				</div>
				<div class="event-right article-contents">
					<h2 class="article-title red-txt">
						<time datetime="<?php echo get_the_date('c') ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time><br/>
						<em><?php the_title() ?></em>
					</h2>
					<?php the_content(); ?>
				</div>
			</article>
			<?php endwhile; ?>
		</div>
	</section>
	<?php endif; ?>

<?php get_footer(); ?>
