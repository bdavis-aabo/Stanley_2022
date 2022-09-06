	<?php if(have_rows('bottom_images')): ?>
	<section class="homepage-section bottom-image-section">
		<div class="bottom-image-container">
			<?php while(have_rows('bottom_images')): the_row();
				$_lgImage  = get_sub_field('large_image');
				$_mobImage = get_sub_field('mobile_image');
			?>
			<picture class="bottom-images">
	      <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
	      <img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="pagehero-img img-fluid" />
	    </picture>
			<?php endwhile; ?>
		</div>
	</section>
	<?php endif; ?>
