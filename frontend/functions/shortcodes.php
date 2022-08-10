<?php 

add_shortcode( 'site_url', 'bitmain_shortcode_site_url' );
function bitmain_shortcode_site_url() {
	return site_url();
}

add_shortcode( 'uploads' , 'bitmain_shortcode_uploads' );
function bitmain_shortcode_uploads() {
	return wp_get_upload_dir()['url'];
}

?>