<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>
<?php the_post(); ?>
<?php 
	$promo_video = carbon_get_the_post_meta( 'promo_video' );
	$promo_img = carbon_get_the_post_meta( 'promo_img' );
	$promo_title = carbon_get_the_post_meta( 'promo_title' );
	$promo_desc = carbon_get_the_post_meta( 'promo_desc' );
	$promo_btn = carbon_get_the_post_meta( 'promo_btn' );
?>
<div id="promo" class="promo section">
	<div class="container">
		<div class="promo-body">
			<h1 class="section-title anim-title h1" data-anim><?php echo nl2br( $promo_title ); ?></h1>
			<?php if ( $promo_desc ) : ?>
			<div class="section-desc"><?php echo nl2br( $promo_desc ); ?></div>
			<?php endif; ?>
			<?php if ( $promo_btn ) : ?>
			<a href="#" class="btn promo-btn">
				<span><?php echo $promo_btn; ?></span>
				<svg width="11" height="11"><use xlink:href="#icon-arrow-right"/></svg>
			</a>
			<?php endif; ?>
		</div>
		<?php if ( $promo_video || $promo_img ) : ?>
		<div class="promo-media">
			<div class="promo-media-body cover-img">
				<?php if ( $promo_video ) : ?>
				<video
					src="<?php echo wp_get_attachment_url( $promo_video ); ?>"
					preload="metadata"
					muted
					autoplay
					playsinline
					loop
					alt="<?php echo get_post_meta( $promo_video, '_wp_attachment_image_alt', true ); ?>"
				></video>
				<?php else : ?>
				<img
					src="<?php echo image_downsize( $promo_img, 'full' )[0]; ?>"
					alt="<?php echo get_post_meta( $promo_img, '_wp_attachment_image_alt', true ); ?>"
				>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php 
	$approach_title = carbon_get_the_post_meta( 'approach_title' );
	$approach_desc = carbon_get_the_post_meta( 'approach_desc' );
	$approach_blocks = carbon_get_the_post_meta( 'approach_blocks' );
	$approach_btn = carbon_get_the_post_meta( 'approach_btn' );
?>
<?php if ( $approach_title || $approach_desc || $approach_blocks || $approach_btn ) : ?>
<div id="approach" class="approach section">
	<img
		src="<?php echo TEMPLATE_URL; ?>/img/approach-decor-left.png"
		alt=""
		class="approach-decor approach-decor-left"
		data-bottom-top="transform:translateY(0px)"
		data-top-bottom="transform:translateY(-400px)"
	>
	<img
		src="<?php echo TEMPLATE_URL; ?>/img/approach-decor-right.png"
		alt=""
		class="approach-decor approach-decor-right"
		data-bottom-top="transform:translateY(0px)"
		data-top-bottom="transform:translateY(400px)"
	>
	<div class="container">
		<?php if ( $approach_title ) : ?>
		<div class="section-title anim-title h2" data-anim><?php echo nl2br( $approach_title ); ?></div>
		<?php endif; ?>
		<?php if ( $approach_desc ) : ?>
		<div class="section-desc"><?php echo nl2br( $approach_desc ); ?></div>
		<?php endif; ?>
		<?php if ( $approach_blocks ) : ?>
		<div class="approach-row flex-row">
			<?php foreach ( $approach_blocks as $item ) : ?>
			<div class="approach-col flex-row-item">
				<div class="approach-item">
					<?php if ( $item['icon'] ) : ?>
					<div class="approach-item-icon">
						<img
							src="<?php echo image_downsize( $item['icon'], 'full' )[0]; ?>"
							alt="<?php echo get_post_meta( $item['icon'], '_wp_attachment_image_alt', true ); ?>"
						>
					</div>
					<?php endif; ?>
					<div class="approach-item-desc"><?php echo nl2br( $item['desc'] ); ?></div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		<?php if ( $approach_btn ) : ?>
		<div class="read-more-btn-wrapp">
			<a href="#" class="btn" data-modal-open="modal-order">
				<span><?php echo $approach_btn; ?></span>
				<svg width="11" height="11"><use xlink:href="#icon-arrow-right"/></svg>
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>
<?php get_footer(); ?>