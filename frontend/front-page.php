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
<div id="promo" class="promo section section-with-decor-left">
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
			<a href="#" class="btn" data-modal-open="modal-order" data-title="<?php echo $approach_btn; ?>">
				<span><?php echo $approach_btn; ?></span>
				<svg width="11" height="11"><use xlink:href="#icon-arrow-right"/></svg>
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>
<?php 
	$repair_img = carbon_get_the_post_meta( 'repair_img' );
	$repair_title = carbon_get_the_post_meta( 'repair_title' );
	$repair_desc = carbon_get_the_post_meta( 'repair_desc' );
	$repair_list = carbon_get_the_post_meta( 'repair_list' );
	$repair_btn = carbon_get_the_post_meta( 'repair_btn' );
?>
<?php if ( $repair_img || $repair_title || $repair_desc || $repair_list || $repair_btn ) : ?>
<div id="repair" class="repair section section-alt section-with-decor-left section-with-decor-right">
	<div class="container">
		<?php if ( $repair_img ) : ?>
		<div class="repair-img">
			<img
				src="<?php echo image_downsize( $repair_img, 'medium' )[0]; ?>"
				srcset="<?php echo image_downsize( $repair_img, 'full' )[0]; ?> 2x"
				alt="<?php echo get_post_meta( $repair_img, '_wp_attachment_image_alt', true ); ?>"
			>
		</div>
		<?php endif; ?>
		<?php if ( $repair_title || $repair_desc || $repair_list || $repair_btn ) : ?>
		<div class="repair-body">
			<?php if ( $repair_title ) : ?>
			<div class="section-title anim-title h2" data-anim><?php echo nl2br( $repair_title ); ?></div>
			<?php endif; ?>
			<?php if ( $repair_desc ) : ?>
			<div class="section-desc"><?php echo nl2br( $repair_desc ); ?></div>
			<?php endif; ?>
			<?php if ( $repair_list ) : ?>
			<div class="repair-list">
				<?php foreach ( $repair_list as $item ) : ?>
				<div class="repair-item">
					<?php if ( $item['icon'] ) : ?>
					<div class="repair-item-icon">
						<img
							src="<?php echo image_downsize( $item['icon'], 'full' )[0]; ?>"
							alt="<?php echo get_post_meta( $item['icon'], '_wp_attachment_image_alt', true ); ?>"
						>
					</div>
					<?php endif; ?>
					<div class="approach-item-title"><?php echo nl2br( $item['title'] ); ?></div>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			<?php if ( $repair_btn ) : ?>
			<a href="#" class="btn" data-modal-open="modal-order" data-title="<?php echo $repair_btn; ?>">
				<span><?php echo $repair_btn; ?></span>
				<svg width="11" height="11"><use xlink:href="#icon-arrow-right"/></svg>
			</a>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>
<?php 
	$company_title = carbon_get_the_post_meta( 'company_title' );
	$company_desc = carbon_get_the_post_meta( 'company_desc' );
	$company_btn = carbon_get_the_post_meta( 'company_btn' );
	$company_bitmain_title = carbon_get_the_post_meta( 'company_bitmain_title' );
	$company_bitmain_logo = carbon_get_the_post_meta( 'company_bitmain_logo' );
	$company_bitmain_link = carbon_get_the_post_meta( 'company_bitmain_link' );
?>
<?php if ( $company_title || $company_desc || $company_btn || $company_bitmain_link || $company_bitmain_logo ) : ?>
<div id="company" class="company section section-alt">
	<img
		src="<?php echo TEMPLATE_URL; ?>/img/company-decor.png"
		alt=""
		class="company-decor"
		data-bottom-top="transform:translateY(0px)"
		data-top-bottom="transform:translateY(-400px)"
	>
	<div class="container">
		<div class="company-main">
			<?php if ( $company_title || $company_desc || $company_btn ) : ?>
			<div class="company-body">
				<?php if ( $company_title ) : ?>
				<div class="section-title anim-title h2" data-anim><?php echo nl2br( $company_title ); ?></div>
				<?php endif; ?>
				<?php if ( $company_desc ) : ?>
				<div class="section-desc"><?php echo nl2br( $company_desc ); ?></div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<?php if ( $company_bitmain_link || $company_bitmain_logo ) : ?>
			<div class="company-bitmain">
				<?php if ( $company_bitmain_title ) : ?>
				<div class="company-bitmain-title" data-anim><?php echo nl2br( $company_bitmain_title ); ?></div>
				<?php endif; ?>
				<?php if ( $company_bitmain_logo ) : ?>
					<?php if ( $company_bitmain_link ) : ?>
					<a href="<?php echo $company_bitmain_link; ?>" class="company-bitmain-logo" target="_blank">
						<img
							src="<?php echo image_downsize( $company_bitmain_logo, 'full' )[0]; ?>"
							alt="<?php echo get_post_meta( $company_bitmain_logo, '_wp_attachment_image_alt', true ); ?>"
						>
					</a>
					<?php else : ?>
					<div class="company-bitmain-logo">
						<img
							src="<?php echo image_downsize( $company_bitmain_logo, 'full' )[0]; ?>"
							alt="<?php echo get_post_meta( $company_bitmain_logo, '_wp_attachment_image_alt', true ); ?>"
						>
					</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
		<?php if ( $company_btn ) : ?>
		<a href="#" class="btn" data-modal-open="modal-order" data-title="<?php echo $company_btn; ?>">
			<span><?php echo $company_btn; ?></span>
			<svg width="11" height="11"><use xlink:href="#icon-arrow-right"/></svg>
		</a>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>
<?php 
	$advantages_img = carbon_get_the_post_meta( 'advantages_img' );
	$advantages_title = carbon_get_the_post_meta( 'advantages_title' );
	$advantages_desc = carbon_get_the_post_meta( 'advantages_desc' );
	$advantages_list = carbon_get_the_post_meta( 'advantages_list' );
	$advantages_btn = carbon_get_the_post_meta( 'advantages_btn' );
?>
<?php if ( $advantages_img || $advantages_title || $advantages_desc || $advantages_list || $advantages_btn ) : ?>
<div id="advantages" class="advantages section section-with-decor-left section-with-decor-right">
	<div class="container">
		<?php if ( $advantages_title ) : ?>
		<div class="section-title anim-title h2" data-anim><?php echo nl2br( $advantages_title ); ?></div>
		<?php endif; ?>
		<?php if ( $advantages_desc ) : ?>
		<div class="section-desc"><?php echo nl2br( $advantages_desc ); ?></div>
		<?php endif; ?>
		<?php if ( $advantages_img || $advantages_list ) : ?>
		<div class="advantages-body">
			<?php 
				$advantages_list = array_chunk( $advantages_list, ceil( count( $advantages_list ) / 2 ) );
				if ( $advantages_list[0] ) :
			?>
			<div class="advantages-list">
				<?php
					foreach ( $advantages_list[0] as $item ) {
						include( TEMPLATEPATH . '/inc/advantages-item.php' );
					}
				?>
			</div>
			<?php endif; ?>
			<?php if ( $advantages_img ) : ?>
			<div class="advantages-img">
				<img
					src="<?php echo image_downsize( $advantages_img, 'medium' )[0]; ?>"
					srcset="<?php echo image_downsize( $advantages_img, 'full' )[0]; ?> 2x"
					alt="<?php echo get_post_meta( $advantages_img, '_wp_attachment_image_alt', true ); ?>"
				>
			</div>
			<?php endif; ?>
			<?php if ( $advantages_list[1] ) : ?>
			<div class="advantages-list">
				<?php
					foreach ( $advantages_list[1] as $item ) {
						include( TEMPLATEPATH . '/inc/advantages-item.php' );
					}
				?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<?php if ( $advantages_btn ) : ?>
		<div class="read-more-btn-wrapp">
			<a href="#" class="btn" data-modal-open="modal-order" data-title="<?php echo $advantages_btn; ?>">
				<span><?php echo $advantages_btn; ?></span>
				<svg width="11" height="11"><use xlink:href="#icon-arrow-right"/></svg>
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>
<?php 
	$docs_title = carbon_get_the_post_meta( 'docs_title' );
	$docs_desc = carbon_get_the_post_meta( 'docs_desc' );
	$docs_gallery = carbon_get_the_post_meta( 'docs_gallery' );
	$docs_btn = carbon_get_the_post_meta( 'docs_btn' );
	$docs_video = carbon_get_the_post_meta( 'docs_video' );
	$docs_video_img = carbon_get_the_post_meta( 'docs_video_img' );
?>
<?php if ( $docs_title || $docs_desc || $docs_gallery || $docs_btn || $docs_video ) : ?>
<div id="docs" class="docs section">
	<img
		src="<?php echo TEMPLATE_URL; ?>/img/docs-decor.png"
		alt=""
		class="docs-decor"
		data-bottom-top="transform:translateY(0px)"
		data-top-bottom="transform:translateY(400px)"
	>
	<div class="container">
		<?php if ( $docs_title || $docs_desc || $docs_gallery || $docs_btn ) : ?>
		<div class="docs-body">
			<?php if ( $docs_title ) : ?>
			<div class="section-title anim-title h2" data-anim><?php echo nl2br( $docs_title ); ?></div>
			<?php endif; ?>
			<?php if ( $docs_desc ) : ?>
			<div class="section-desc"><?php echo nl2br( $docs_desc ); ?></div>
			<?php endif; ?>
			<?php if ( $docs_gallery ) : ?>
			<ul class="docs-gallery">
				<?php foreach ( $docs_gallery as $item ) : ?>
				<li>
					<a href="<?php echo image_downsize( $item, 'full' )[0]; ?>" class="gallery-link glightbox" data-gallery="docs">
						<img
							src="<?php echo image_downsize( $item, 'medium' )[0]; ?>"
							srcset="<?php echo image_downsize( $item, 'large' )[0]; ?> 2x"
							alt="<?php echo get_post_meta( $item, '_wp_attachment_image_alt', true ); ?>"
						>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
			<?php if ( $docs_btn ) : ?>
			<a href="#" class="btn" data-modal-open="modal-order" data-title="<?php echo $docs_btn; ?>">
				<span><?php echo $docs_btn; ?></span>
				<svg width="11" height="11"><use xlink:href="#icon-arrow-right"/></svg>
			</a>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<?php if ( $docs_video ) : ?>
		<a href="<?php echo wp_get_attachment_url( $docs_video ); ?>" class="docs-video video-link cover-img glightbox" data-gallery="docs-video">
			<?php if ( $docs_video_img ) : ?>
			<img
				src="<?php echo image_downsize( $docs_video_img, 'medium' )[0]; ?>"
				srcset="<?php echo image_downsize( $docs_video_img, 'full' )[0]; ?> 2x"
				alt="<?php echo get_post_meta( $docs_video_img, '_wp_attachment_image_alt', true ); ?>"
			>
			<?php else : ?>
			<video
				src="<?php echo wp_get_attachment_url( $docs_video ); ?>"
				preload="metadata"
				alt="<?php echo get_post_meta( $docs_video, '_wp_attachment_image_alt', true ); ?>"
			></video>
			<?php endif; ?>
			<i class="video-link-icon">
				<svg width="24" height="29"><use xlink:href="#icon-play"/></svg>
			</i>
		</a>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>
<?php 
	$faq_title = carbon_get_the_post_meta( 'faq_title' );
	$faq_desc = carbon_get_the_post_meta( 'faq_desc' );
	$faq_accordion = carbon_get_the_post_meta( 'faq_accordion' );
	$faq_btn = carbon_get_the_post_meta( 'faq_btn' );
?>
<?php if ( $faq_title || $faq_desc || $faq_accordion || $faq_btn ) : ?>
<div id="faq" class="faq section section-alt section-with-decor-left section-with-decor-right">
	<div class="container">
		<?php if ( $faq_title ) : ?>
		<div class="section-title anim-title h2" data-anim><?php echo nl2br( $faq_title ); ?></div>
		<?php endif; ?>
		<?php if ( $faq_desc ) : ?>
		<div class="section-desc"><?php echo nl2br( $faq_desc ); ?></div>
		<?php endif; ?>
		<?php if ( $faq_accordion ) : ?>
		<div class="accordion">
		<?php foreach ( $faq_accordion as $item ) : ?>
		<div class="accordion-item">
			<a href="#" class="accordion-item-toggle h4">
				<span><?php echo $item['question']; ?></span>
				<i></i>
			</a>
			<div class="accordion-item-body">
				<div class="accordion-item-content content-text">
					<?php echo apply_filters( 'the_content', $item['answer'] ); ?>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
		<?php endif; ?>
		<?php if ( $faq_btn ) : ?>
		<div class="read-more-btn-wrapp">
			<a href="#" class="btn" data-modal-open="modal-order" data-title="<?php echo $faq_btn; ?>">
				<span><?php echo $faq_btn; ?></span>
				<svg width="11" height="11"><use xlink:href="#icon-arrow-right"/></svg>
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>
<?php get_footer(); ?>