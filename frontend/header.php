<!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no">
	<script>window.SITE_URL = '<?php echo site_url(); ?>';</script>
	<?php wp_site_icon(); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php get_template_part( 'inc/sprite' ); ?>
<?php 
	$logo = carbon_get_the_post_meta( 'logo' );
	$header_tel = carbon_get_the_post_meta( 'header_tel' );
	$header_btn = carbon_get_the_post_meta( 'header_btn' );
	$header_partners = carbon_get_the_post_meta( 'header_partners' );
 ?>
<header class="header">
	<div class="container">
		<?php
			if ( $logo ) :
				if ( is_front_page() ) :
		?>
		<span class="header-logo">
			<img
				src="<?php echo image_downsize( $logo, 'full' )[0]; ?>"
				alt="<?php echo get_post_meta( $logo, '_wp_attachment_image_alt', true ); ?>"
			>
		</span>
			<?php else : ?>
		<a href="<?php echo home_url( '/' ); ?>" class="header-logo" aria-label="<?php _e( 'На главную', DOMAIN ); ?>">
			<img
				src="<?php echo image_downsize( $logo, 'full' )[0]; ?>"
				alt="<?php echo get_post_meta( $logo, '_wp_attachment_image_alt', true ); ?>"
			>
		</a>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( has_nav_menu( 'header' ) || $header_tel || $header_btn || $header_partners ) : ?>
		<div class="header-nav">
			<div class="header-nav-body">
				<?php
					if ( has_nav_menu( 'header' ) ) {
						wp_nav_menu( [
							'theme_location' => 'header',
							'container'      => false,
							'menu_class'     => 'header-menu',
						] );
					}
				?>
				<?php if ( $header_tel ) :  ?>
				<a href="tel:<?php echo preg_replace( '![^0-9]+!', '', $header_tel ); ?>" class="header-tel">
					<svg width="13" height="13"><use xlink:href="#icon-phone"/></svg>
					<span><?php echo $header_tel; ?></span>
				</a>
				<?php endif; ?>
				<?php if ( $header_btn ) : ?>
				<a href="#" class="btn btn-border header-btn" data-modal-open="modal-order">
					<span><?php echo $header_btn; ?></span>
				</a>
				<?php endif; ?>
				<ul class="header-languages"><?php 
					pll_the_languages(
						array(
							'display_names_as' => 'slug',
						)
					); ?></ul>
				<?php if ( $header_partners ) : ?>
				<ul class="header-partners">
					<?php foreach ( $header_partners as $item ) : ?>
					<li>
						<?php if ( $item['link'] ) : ?>
						<a href="<?php echo $item['link']; ?>" class="header-partner" target="_blank">
							<img
								src="<?php echo image_downsize( $item['logo'], 'full' )[0]; ?>"
								alt="<?php echo get_post_meta( $item['logo'], '_wp_attachment_image_alt', true ); ?>"
							>
						</a>
						<?php else : ?>
						<span class="header-partner">
							<img
								src="<?php echo image_downsize( $item['logo'], 'full' )[0]; ?>"
								alt="<?php echo get_post_meta( $item['logo'], '_wp_attachment_image_alt', true ); ?>"
							>
						</span>
						<?php endif; ?>
					</li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>
			<a href="#" class="header-nav-close" aria-label="<?php _e( 'Закрыть', DOMAIN ); ?>">
				<svg width="20" height="20"><use xlink:href="#icon-close"/></svg>
			</a>
		</div>
		<?php endif; ?>
		<?php if ( $header_tel ) :  ?>
		<a href="tel:<?php echo preg_replace( '![^0-9]+!', '', $header_tel ); ?>" class="header-tel visible-tablet">
			<svg width="13" height="13"><use xlink:href="#icon-phone"/></svg>
			<span><?php echo $header_tel; ?></span>
		</a>
		<?php endif; ?>
		<?php if ( has_nav_menu( 'header' ) || $header_tel || $header_btn || $header_partners ) : ?>
		<a href="#" class="header-nav-open btn" aria-label="<?php _e( 'Меню', DOMAIN ); ?>">
			<svg width="24" height="24"><use xlink:href="#icon-menu"/></svg>
		</a>
		<?php endif; ?>
	</div>
</header>