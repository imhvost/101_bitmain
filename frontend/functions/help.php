<?php 

function bitmain_nl2tag( $tag, $string ) {
	return "<$tag>" . preg_replace( array( '/([\n]{1,})/i', '/([^>])\n([^<])/i' ), array( "</$tag>\n<$tag>", "$1<br>$2" ), trim( $string ) ) . "</$tag>";
}

function bitmain_get_page_id_by_template( $template ) {
	$args = array(
		'post_type'   => 'page',
		'fields'      => 'ids',
		'numberposts' => 1,
		'meta_key'    => '_wp_page_template',
		'meta_value'  => $template,
	);
	$pages = get_posts( $args );
	return $pages[0];
}

function bitmain_force_404() {
	global $wp_query;
	$wp_query->set_404();
	status_header( 404 );
	get_template_part( 404 );
	exit();
}

?>