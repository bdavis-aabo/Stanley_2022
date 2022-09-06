<?php get_header(); ?>

	<section class="page-section page-heroimage">
		<picture class="page-heroimage">
			<source media="(max-width: 520px)" srcset="<?php bloginfo('template_directory') ?>/assets/images/news-mobile.jpg">
			<img src="<?php bloginfo('template_directory') ?>/assets/images/news-heroimage.jpg" alt="<?php bloginfo('name') ?> - News" class="pagehero-img img-fluid" />
		</picture>
		<img src="<?php bloginfo('template_directory') ?>/assets/images/down-arrow.svg" alt="up arrow" class="down-arrow" />
	</section>

	<?php if(have_posts()): ?>
	<section class="page-section news-section">
		<div class="news-container">
			<?php while(have_posts()): the_post(); ?>
			<article class="news-article" id="<?php echo 'post-' . $post->ID ?>">
				<figure class="article-thumbnail">
					<?php echo get_the_post_thumbnail($post->ID, 'thumbnail', array('class' => 'img-fluid')); ?>
				</figure>
				<div class="article-contents">
					<h2 class="article-title red-txt">
						<time datetime="<?php echo get_the_date('c') ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time><br/>
						<em><?php the_title() ?></em>
					</h2>
					<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="btn arrow-btn">
						Read More <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/right-arrow.svg') ?>
					</a>
				</div>
			</article>
			<?php endwhile; ?>
		</div>
	</section>
	<?php endif; ?>

<?php get_footer(); ?>
