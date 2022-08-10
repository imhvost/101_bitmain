<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

function bitmain_crb_block_accordion() {
	$complex_labels = array(
		'plural_name'   => __( 'Элементы', DOMAIN ),
		'singular_name' => __( 'Элемент', DOMAIN ),
	);
	Block::make( 'accordion', __( 'Аккордеон', DOMAIN ) )
		->add_fields( array(
			Field::make( 'complex', 'accordion', __( 'Аккордеон', DOMAIN ) )
				->set_collapsed( true )
				->setup_labels( $complex_labels )
				->add_fields( array(
					Field::make( 'text', 'title', __( 'Заголовок', DOMAIN ) )
						->set_required( true ),
					Field::make( 'rich_text', 'desc', __( 'Описание', DOMAIN ) )
						->set_required( true ),
				) )
				->set_header_template( '<%- title %>' )
				->set_layout( 'tabbed-vertical' ),
		) )
		->set_description( __( 'Аккордеон', DOMAIN ) )
		->set_preview_mode( true )
		->set_category( __( 'Блоки темы', DOMAIN ) )
		->set_render_callback( function ( $fields ) {
			if ( $fields['accordion'] ):
?>
<div class="content-custom-block content-custom-block-accordion">
	<div class="accordion">
		<?php foreach ( $fields['accordion'] as $item ) : ?>
		<div class="accordion-item">
			<a href="#" class="accordion-item-toggle h3">
				<span><?php echo $item['title']; ?></span>
				<i></i>
			</a>
			<div class="accordion-item-body">
				<div class="accordion-item-content">
					<?php echo apply_filters( 'the_content', $item['desc'] ); ?>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<?php
			endif;
		});
}

add_action( 'carbon_fields_register_fields', 'bitmain_crb_block_accordion' );