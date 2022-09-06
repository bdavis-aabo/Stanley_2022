<?php /*
	<section class="page-section page-follow-section">
		<div class="follow-container">
			<h3 class="red-txt">Follow Us - @StanleyMarketplace</h3>
		</div>
	</section>
*/ ?>

	<footer class="footer dkblue-bg">
		<button class="btn up-arrow">
			<img src="<?php bloginfo('template_directory') ?>/assets/images/up-arrow.svg" alt="up arrow" />
		</button>
		<section class="footer-top">
			<div class="contact-form-container" id="contact">
				<h2>Stay in the know</h2>
				<p>Sign up to receive updates from Stanley Marketplace.</p>

				<div class="contact-form">
					<?php echo do_shortcode('[contact-form-7 id="5" title="Footer Form"]') ?>
				</div>
			</div>
			<div class="footer-navigation">
				<ul class="footer-links">
					<li>
						<a href="https://www.stanleygiftcards.com" target="_blank">Gift Cards</a>
					</li>
					<li><a href="mailto:ally@stanleymarketplace.com?subject=I%20am%20interested%20in%20Booking%20an%20Event">Book an Event</a></li>
					<li><a href="mailto:ally@stanleymarketplace.com?subject=I%30have%20a%20question">General Inquiries</a></li>
					<li><a href="mailto:stanley@feedmedia.com">Press Inquiries</a></li>
					<li><a href="mailto:david@axiore.com">Leasing Inquiries</a></li>
					<li><a href="tel:7204852234">Security/Lost & Found</a></li>
					<li><a href="/now-hiring">Careers</a></li>
				</ul>
			</div>
		</section>
		<section class="footer-bottom">
			<div class="footer-bottom-left">
				<div class="company-information">
					<img src="<?php bloginfo('template_directory') ?>/assets/images/stanley-white_logo.svg" alt="<?php bloginfo('name') ?> - Logo" class="img-fluid" />
					<?php if(is_active_sidebar('footer-address')): dynamic_sidebar('footer-address'); endif; ?>
				</div>
			</div>
			<ul class="social-links">
				<li><a href="https://www.facebook.com/Stanleymarketplace" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
				<li><a href="https://www.instagram.com/stanleymarketplace/" target="_blank"><i class="fab fa-instagram"></i></a></li>
				<li><a href="https://www.tiktok.com/@stanley_marketplace" target="_blank"><i class="fab fa-tiktok"></i></a></li>
			</ul>
			<p class="copyright">&copy<?php echo date('Y') ?> Copyright Stanley Marketplace</p>
		</section>
	</footer>

	<?php wp_footer() ?>
</body>
</html>
