<?php /* Template Name: Page - Events */ ?>

<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post();
	$_mobImage = get_field('mobile_image');
	$_lgImage = get_field('large_image');
?>
<section class="page-section page-heroimage">
	<picture class="page-heroimage">
		<source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
		<img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="pagehero-img img-fluid" />
	</picture>
	<img src="<?php bloginfo('template_directory') ?>/assets/images/down-arrow.svg" alt="up arrow" class="down-arrow" />
</section>

<section class="page-section page-content-section shop-content-section">
	<div class="page-content-container">
		<?php the_content(); ?>
	</div>
</section>
<?php endwhile; endif; ?>

<?php if(is_page('stanley-events')): get_template_part('page/page-events'); endif; ?>

<?php get_footer(); ?>
