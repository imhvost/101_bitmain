<ul class="breadcrumbs">
	<li>
		<a href="<?php echo home_url( '/' ); ?>"><?php _e( 'Главная', DOMAIN ); ?></a>
	</li>
	<?php 
		$post_types = array(
			'services'    => 'service',
		);
		foreach ( $post_types as $page_slug => $post_type ) {
			if ( get_post_type() === $post_type) {
				$page_id = bitmain_get_page_id_by_template( 'page-' . $page_slug . '.php' );
			}
		}
		if ( $page_id ):
	?>
	<li>
		<a href="<?php echo get_the_permalink( $page_id ); ?>"><?php echo get_the_title( $page_id ); ?></a>
	</li>
	<?php endif; ?>
	<?php 
		$ancestors = get_post_ancestors( $post->ID );
		if ( $ancestors ):
		$ancestors = array_reverse( $ancestors );
			foreach ( $ancestors as $item ):
	?>
	<li>
		<a href="<?php echo get_the_permalink( $item ); ?>"><?php echo get_the_title( $item ); ?></a>
	</li>
	<?php 
			endforeach;
		endif;
	?>
	<?php if( is_singular() ): ?>
	<li>
		<span><?php the_title(); ?></span>
	</li>
	<?php endif; ?>
	<?php if( is_404() ): ?>
	<li>
		<span><?php _e( 'Ошибка 404', DOMAIN ); ?></span>
	</li>
	<?php endif; ?>
</ul>