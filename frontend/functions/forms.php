<?php 

add_action( 'wp_ajax_nopriv_bitmain_form_action', 'bitmain_form_action' );
add_action( 'wp_ajax_bitmain_form_action', 'bitmain_form_action' );

function bitmain_form_action() {
	
	if ( empty($_POST) ){
		exit();
	}
	
	if ( $_POST['feedback_nonce_field'] && ! wp_verify_nonce( $_POST['feedback_nonce_field'], 'feedback') ){
		exit();
	}
	if ( $_POST['promo_nonce_field'] && ! wp_verify_nonce( $_POST['promo_nonce_field'], 'promo') ){
		exit();
	}
	if ( $_POST['modal_nonce_field'] && ! wp_verify_nonce( $_POST['modal_nonce_field'], 'modal') ){
		exit();
	}
	
	$title = $_POST['title'];
	$name = $_POST['name'];
	$tel = $_POST['tel'];
	$email = $_POST['email'];
	$text = $_POST['text'];
	
	$files = $_FILES;
	$attachments = array();
	if ( count( $files ) ) {
		$file_links = '';
		foreach ( $files as $file ) {
			$file_name = basename( $file['name'] );
			if ( $file_name ) {
				$folder = TEMPLATEPATH . '/files';
				if ( !file_exists( $folder ) ) {
					mkdir( $folder, 0777, true );
				}
				$file_name = explode( '.', $file_name );
				$file_name = $file_name[0] . '_' . time() . '.' . $file_name[count( $file_name ) - 1];
				$file_path = $folder . '/' . $file_name;
				$f = move_uploaded_file( $file['tmp_name'], $file_path );
				$attachments[] = $file_path;
				$file_links .= '<a href="' . TEMPLATE_URL . '/files/' . $file_name . '" download>' . $file['name'] . '</a>';
			}
		}
	}
	
	// var_dump($f);
	// var_dump($attachments);
	
	$headers = array(
		'From: <' . get_bloginfo( 'admin_email' ) . '>',
		'Content-Type: text/html',
	);
	$subject = $title;
	
	date_default_timezone_set( 'Europe/Moscow' );
	$msg = '<p><b>' . __( 'Дата', DOMAIN ) . ':</b> ' . date( 'd.m.Y H:m:s' ) . '</p>';
	if ( !empty( $title ) ) {
		$msg .= '<p><b>' . __( 'Что хотят', DOMAIN ) . ':</b> ' . $title . '</p>';
	}
	if ( !empty( $name ) ) {
		$msg .= '<p><b>' . __( 'Имя', DOMAIN ) . ':</b> ' . $name . '</p>';
	}
	if ( !empty( $tel ) ) {
		$msg .= '<p><b>' . __( 'Телефон', DOMAIN ) . ':</b> ' . $tel . '</p>';
	}
	if ( !empty( $email ) ) {
		$msg .= '<p><b>' . __( 'Email', DOMAIN ) . ':</b> ' . $email . '</p>';
	}
	if ( !empty( $text ) ) {
		$msg .= '<p><b>' . __( 'Комментарий', DOMAIN ) . ':</b> ' . $text . '</p>';
	}
	if ( count( $file_links ) ) {
		$msg .= '<p><b>' . __( 'Файлы', DOMAIN ) . ': </b> ' . $file_links . '</p>';
	}
	
	if ( $_SERVER['REMOTE_ADDR'] ) {
		$msg .= '<p><b>IP:</b> ' . $_SERVER['REMOTE_ADDR'] . '</p>';
	}
	if ( $_SERVER['HTTP_REFERER'] ) {
		$msg .= '<p><b>UTM:</b> <a href="' . $_SERVER['HTTP_REFERER'] . '" target="_blank">' . $_SERVER['HTTP_REFERER'] . '</a></p>';
	}
	
	remove_filter( 'wp_mail_from', 'custom_wp_mail_from' );
	
	$send_to = get_bloginfo( 'admin_email' );
	
	if ( $tel || $email ) {
		$m = wp_mail( $send_to, $subject, $msg, $headers, $attachments );
		if ( $m ) {
			echo 'sent';
		} else {
			echo 'error';
		}
	}

	wp_die();
	
}

?>