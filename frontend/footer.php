<footer class="footer">
	
</footer>
<?php 
	$modal_title = carbon_get_theme_option( 'modal_title' );
	$modal_slider = carbon_get_theme_option( 'modal_slider' );
	$modal_sent_title = carbon_get_theme_option( 'modal_sent_title' );
	$modal_sent_desc = carbon_get_theme_option( 'modal_sent_desc' );
	$front_page_id = get_option( 'page_on_front' );
	$feedback_form_agreement = carbon_get_post_meta( $front_page_id, 'feedback_form_agreement' );
 ?>
<div id="modal-order" aria-hidden="true" class="modal modal-order">
	<div tabindex="-1" class="modal-wrapp">
		<div role="dialog" aria-modal="true" class="modal-body">
			<a href="#" class="modal-close-btn" aria-label="<?php _e( 'Закрыть', DOMAIN ); ?>" data-modal-close>
				<svg width="20" height="20"><use xlink:href="#icon-close"/></svg>
			</a>
			<?php if ( $modal_slider ) : ?>
			<div class="modal-order-slider swiper">
				<div class="swiper-wrapper">
					<?php foreach ( $modal_slider as $key => $item ) : ?>
					<div class="modal-order-slide swiper-slide cover-img">
						<?php if ( $key === 0 ) : ?>
						<img
							src="<?php echo image_downsize( $item, 'bitmain-modal-slide' )[0]; ?>"
							srcset="<?php echo image_downsize( $item, 'full' )[0]; ?> 2x"
							alt="<?php echo get_post_meta( $item, '_wp_attachment_image_alt', true ); ?>"
							loading="lazy"
						>
						<?php else : ?>
						<img
							src="?"
							data-src="<?php echo image_downsize( $item, 'bitmain-modal-slide' )[0]; ?>"
							data-srcset="<?php echo image_downsize( $item, 'full' )[0]; ?> 2x"
							alt="<?php echo get_post_meta( $item, '_wp_attachment_image_alt', true ); ?>"
							class="swiper-lazy"
						>
						<div class="swiper-lazy-preloader"></div>
						<?php endif; ?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>
			<div class="modal-order-body">
				<?php if ( $modal_title ) : ?>
				<div class="modal-title"><?php echo $modal_title; ?></div>
				<?php endif; ?>
				<form action="?" class="modal-form form" data-alert="<?php _e( 'Ошибка. Пожалуйста, попробуйте еще раз, или свяжитесь с нами по телефону.', DOMAIN ); ?>">
					<?php wp_nonce_field( 'modal', 'modal_nonce_field' ); ?>
					<input type="hidden" name="title" value="<?php _e( 'Новая заявка', DOMAIN ); ?>" data-title="<?php _e( 'Новая заявка', DOMAIN ); ?>">
					<div class="form-block">
						<label class="input-block" aria-label="<?php _e( 'Ваше имя *', DOMAIN ); ?>">
							<input type="text" class="input" name="name" placeholder="<?php _e( 'Ваше имя *', DOMAIN ); ?>" required>
							<span class="input-icon">
								<svg width="13" height="14"><use xlink:href="#icon-user"/></svg>
							</span>
						</label>
					</div>
					<div class="form-block">
						<label class="input-block" aria-label="<?php _e( 'Телефон', DOMAIN ); ?>">
							<input type="tel" class="input" name="tel" placeholder="<?php _e( '+7 (___) ___-__-__', DOMAIN ); ?>" required>
							<span class="input-icon">
								<svg width="12" height="12"><use xlink:href="#icon-tel"/></svg>
							</span>
						</label>
					</div>
					<div class="modal-form-submit-wrapp">
						<?php if ( $feedback_form_agreement ) : ?>
						<div class="form-agreement">
							<?php echo nl2br ( $feedback_form_agreement ); ?>
						</div>
						<?php endif; ?>
						<button type="submit" class="btn submit">
							<span><?php echo $feedback_form_btn ?: __( 'Отправить', DOMAIN ); ?></span>
							<svg width="12" height="15"><use xlink:href="#icon-arrow-right"/></svg>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div id="modal-sent" aria-hidden="true" class="modal modal-sent">
	<div tabindex="-1" class="modal-wrapp">
		<div role="dialog" aria-modal="true" class="modal-body">
			<a href="#" class="modal-close-btn" aria-label="<?php _e( 'Close', DOMAIN ); ?>" data-modal-close>
				<svg width="20" height="20"><use xlink:href="#icon-close"/></svg>
			</a>
			<?php if ( $modal_sent_title ) : ?>
			<div class="modal-title"><?php echo $modal_sent_title; ?></div>
			<?php endif; ?>
			<?php if ( $modal_sent_desc ) : ?>
			<div class="modal-desc"><?php echo nl2br( $modal_sent_desc ); ?></div>
			<?php endif; ?>
			<svg class="modal-sent-icon" width="146" height="139" viewBox="0 0 146 139" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path class="modal-sent-icon-circle" stroke-dasharray="350" stroke-dashoffset="350" d="M135.4 63.2338V69.5085C135.392 84.0581 130.749 98.2151 122.163 109.868C113.578 121.521 101.511 130.045 87.7608 134.171C74.0111 138.296 59.315 137.801 45.8651 132.759C32.4151 127.717 20.9317 118.398 13.1276 106.192C5.32349 93.9872 1.61672 79.5482 2.56015 65.0306C3.50357 50.5128 9.04667 36.6933 18.3627 25.6333C27.6787 14.5733 40.2685 6.86529 54.2545 3.65888C68.2405 0.452469 82.8735 1.91944 95.9701 7.84101" stroke="#EC7653" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
			<path class="modal-sent-icon-check" stroke-dasharray="136" stroke-dashoffset="-136" d="M143.586 7.18945L69.6414 82.9631L49.4746 62.2977" stroke="#202348" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>