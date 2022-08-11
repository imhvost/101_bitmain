<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'bitmain_crb_init_fields' );
function bitmain_crb_init_fields() {
	
	$complex_labels = array(
		'plural_name'   => __( 'Элементы', DOMAIN ),
		'singular_name' => __( 'Элемент', DOMAIN ),
	);
	
	/* home */
	Container::make( 'post_meta', __( 'Поля', DOMAIN ) )
		->where( 'post_template', '=', 'front-page.php' )
		->add_tab( __( 'Основное', DOMAIN ), array(
			Field::make( 'image', 'logo', __( 'Лого', DOMAIN ) ),
			Field::make( 'text', 'header_tel', __( 'Шапка - телефон', DOMAIN ) ),
			Field::make( 'text', 'header_btn', __( 'Шапка - кнопка', DOMAIN ) ),
			Field::make( 'complex', 'header_partners', __( 'Шапка - партнеры', DOMAIN ) )
				->setup_labels( $complex_labels )
				->set_collapsed( true )
				->set_layout( 'tabbed-vertical' )
				->add_fields( array(
					Field::make( 'image', 'logo', __( 'Лого', DOMAIN ) )
						->set_required( true ),
					Field::make( 'text', 'link', __( 'Ссылка', DOMAIN ) ),
				) ),
			Field::make( 'complex', 'contacts_telegrams', __( 'Контакты - телеграм', DOMAIN ) )
				->setup_labels( $complex_labels )
				->set_collapsed( true )
				->set_layout( 'tabbed-vertical' )
				->add_fields( array(
					Field::make( 'text', 'title', __( 'Заголовок', DOMAIN ) ),
					Field::make( 'text', 'link', __( 'Ссылка', DOMAIN ) )
						->set_required( true ),
				) )
				->set_header_template( '<%- title %>' ),
			Field::make( 'complex', 'footer_contacts_tels', __( 'Контакты - телефоны', DOMAIN ) )
				->setup_labels( $complex_labels )
				->set_collapsed( true )
				->set_layout( 'tabbed-vertical' )
				->add_fields( array(
					Field::make( 'text', 'tel', __( 'Номер телефона', DOMAIN ) ),
				) )
				->set_header_template( '<%- tel %>' ),
			Field::make( 'complex', 'contacts_links', __( 'Контакты - дополнительные ссылки', DOMAIN ) )
				->setup_labels( $complex_labels )
				->set_collapsed( true )
				->set_layout( 'tabbed-vertical' )
				->add_fields( array(
					Field::make( 'image', 'icon', __( 'Иконка', DOMAIN ) ),
					Field::make( 'text', 'title', __( 'Заголовок', DOMAIN ) ),
					Field::make( 'text', 'link', __( 'Ссылка', DOMAIN ) )
						->set_required( true ),
				) )
				->set_header_template( '<%- title %>' ),
			Field::make( 'complex', 'sales_channel_telegrams', __( 'Канал по продажам - телеграм', DOMAIN ) )
				->setup_labels( $complex_labels )
				->set_collapsed( true )
				->set_layout( 'tabbed-vertical' )
				->add_fields( array(
					Field::make( 'text', 'title', __( 'Заголовок', DOMAIN ) ),
					Field::make( 'text', 'link', __( 'Ссылка', DOMAIN ) )
						->set_required( true ),
				) )
				->set_header_template( '<%- title %>' ),
			Field::make( 'complex', 'sales_channel_tels', __( 'Канал по продажам - телефоны', DOMAIN ) )
				->setup_labels( $complex_labels )
				->set_collapsed( true )
				->set_layout( 'tabbed-vertical' )
				->add_fields( array(
					Field::make( 'text', 'tel', __( 'Номер телефона', DOMAIN ) ),
				) )
				->set_header_template( '<%- tel %>' ),
			Field::make( 'complex', 'sales_channel_links', __( 'Канал по продажам - дополнительные ссылки', DOMAIN ) )
				->setup_labels( $complex_labels )
				->set_collapsed( true )
				->set_layout( 'tabbed-vertical' )
				->add_fields( array(
					Field::make( 'image', 'icon', __( 'Иконка', DOMAIN ) ),
					Field::make( 'text', 'title', __( 'Заголовок', DOMAIN ) ),
					Field::make( 'text', 'link', __( 'Ссылка', DOMAIN ) )
						->set_required( true ),
				) )
				->set_header_template( '<%- title %>' ),
			Field::make( 'complex', 'footer_sites', __( 'Основной сайт', DOMAIN ) )
				->setup_labels( $complex_labels )
				->set_collapsed( true )
				->set_layout( 'tabbed-vertical' )
				->add_fields( array(
					Field::make( 'text', 'title', __( 'Заголовок', DOMAIN ) ),
					Field::make( 'text', 'link', __( 'Ссылка', DOMAIN ) )
						->set_required( true ),
				) )
				->set_header_template( '<%- title %>' ),
			Field::make( 'text', 'copyright', __( 'Копирайт', DOMAIN ) ),
		) )
		->add_tab( __( 'Промо', DOMAIN ), array(
			Field::make( 'file', 'promo_video', __( 'Видео', DOMAIN ) )
				->set_type( 'video' ),
			Field::make( 'image', 'promo_img', __( 'Картинка', DOMAIN ) ),
			Field::make( 'textarea', 'promo_title', __( 'Заголовок', DOMAIN ) )
				->set_required( true )
				->set_rows( 3 ),
			Field::make( 'textarea', 'promo_desc', __( 'Описание', DOMAIN ) )
				->set_rows( 3 ),
			Field::make( 'text', 'promo_btn', __( 'Кнопка', DOMAIN ) ),
		) )
		->add_tab( __( 'Подход', DOMAIN ), array(
			Field::make( 'textarea', 'approach_title', __( 'Заголовок', DOMAIN ) )
				->set_rows( 3 ),
			Field::make( 'textarea', 'approach_desc', __( 'Описание', DOMAIN ) )
				->set_rows( 3 ),
			Field::make( 'complex', 'approach_blocks', __( 'Блоки', DOMAIN ) )
				->setup_labels( $complex_labels )
				->set_collapsed( true )
				->set_layout( 'tabbed-vertical' )
				->add_fields( array(
					Field::make( 'image', 'icon', __( 'Иконка', DOMAIN ) ),
					Field::make( 'textarea', 'desc', __( 'Описание', DOMAIN ) )
						->set_required( true )
						->set_rows( 3 ),
				) )
				->set_header_template( '<%= desc %>' ),
			Field::make( 'text', 'approach_btn', __( 'Кнопка', DOMAIN ) ),
		) )
		->add_tab( __( 'Ремонт', DOMAIN ), array(
			Field::make( 'image', 'repair_img', __( 'Картинка', DOMAIN ) ),
			Field::make( 'textarea', 'repair_title', __( 'Заголовок', DOMAIN ) )
				->set_rows( 3 ),
			Field::make( 'textarea', 'repair_desc', __( 'Описание', DOMAIN ) )
				->set_rows( 3 ),
			Field::make( 'complex', 'repair_list', __( 'Список', DOMAIN ) )
				->setup_labels( $complex_labels )
				->set_collapsed( true )
				->set_layout( 'tabbed-vertical' )
				->add_fields( array(
					Field::make( 'image', 'icon', __( 'Иконка', DOMAIN ) ),
					Field::make( 'textarea', 'title', __( 'Заголовок', DOMAIN ) )
						->set_required( true )
						->set_rows( 3 ),
				) )
				->set_header_template( '<%- title %>' ),
			Field::make( 'text', 'repair_btn', __( 'Кнопка', DOMAIN ) ),
		) )
		->add_tab( __( 'Компания', DOMAIN ), array(
			Field::make( 'textarea', 'company_title', __( 'Заголовок', DOMAIN ) )
				->set_rows( 3 ),
			Field::make( 'textarea', 'company_desc', __( 'Описание', DOMAIN ) )
				->set_rows( 3 ),
			Field::make( 'text', 'company_btn', __( 'Кнопка', DOMAIN ) ),
			Field::make( 'text', 'company_bitmain_title', __( 'Bitmain - заголовок', DOMAIN ) ),
			Field::make( 'image', 'company_bitmain_logo', __( 'Bitmain - лого', DOMAIN ) ),
			Field::make( 'text', 'company_bitmain_link', __( 'Bitmain - ссылка', DOMAIN ) ),
		) )
		->add_tab( __( 'Преимущества', DOMAIN ), array(
			Field::make( 'image', 'advantages_img', __( 'Картинка', DOMAIN ) ),
			Field::make( 'textarea', 'advantages_title', __( 'Заголовок', DOMAIN ) )
				->set_rows( 3 ),
			Field::make( 'textarea', 'advantages_desc', __( 'Описание', DOMAIN ) )
				->set_rows( 3 ),
			Field::make( 'complex', 'advantages_list', __( 'Список', DOMAIN ) )
				->setup_labels( $complex_labels )
				->set_collapsed( true )
				->set_layout( 'tabbed-vertical' )
				->add_fields( array(
					Field::make( 'image', 'icon', __( 'Иконка', DOMAIN ) ),
					Field::make( 'textarea', 'title', __( 'Заголовок', DOMAIN ) )
						->set_required( true )
						->set_rows( 3 ),
				) )
				->set_header_template( '<%= title %>' ),
			Field::make( 'text', 'advantages_btn', __( 'Кнопка', DOMAIN ) ),
		) )
		->add_tab( __( 'Документы', DOMAIN ), array(
			Field::make( 'textarea', 'docs_title', __( 'Заголовок', DOMAIN ) )
				->set_rows( 3 ),
			Field::make( 'textarea', 'docs_desc', __( 'Описание', DOMAIN ) )
				->set_rows( 3 ),
			Field::make( 'media_gallery', 'docs_gallery', __( 'Галерея', DOMAIN ) )
				->set_type( 'image' ),
			Field::make( 'text', 'docs_btn', __( 'Кнопка', DOMAIN ) ),
			Field::make( 'file', 'docs_video', __( 'Видео', DOMAIN ) )
				->set_type( 'video' ),
			Field::make( 'image', 'docs_video_img', __( 'Видео постер', DOMAIN ) ),
		) )
		->add_tab( __( 'FAQ', DOMAIN ), array(
			Field::make( 'textarea', 'faq_title', __( 'Заголовок', DOMAIN ) )
				->set_rows( 3 ),
			Field::make( 'textarea', 'faq_desc', __( 'Описание', DOMAIN ) )
				->set_rows( 3 ),
			Field::make( 'complex', 'faq_accordion', __( 'Аккордеон', DOMAIN ) )
				->set_collapsed( true )
				->setup_labels( $complex_labels )
				->set_layout( 'tabbed-vertical' )
				->add_fields( array(
					Field::make( 'text', 'question', __( 'Вопрос', DOMAIN ) )
						->set_required( true ),
					Field::make( 'rich_text', 'answer', __( 'Ответ', DOMAIN ) )
						->set_required( true ),
				) )
				->set_header_template( '<%- question %>' ),
			Field::make( 'text', 'faq_btn', __( 'Кнопка', DOMAIN ) ),
		) )
		->add_tab( __( 'Контакты', DOMAIN ), array(
			Field::make( 'text', 'contacts_title', __( 'Заголовок', DOMAIN ) ),
			Field::make( 'textarea', 'contacts_desc', __( 'Описание', DOMAIN ) )
				->set_rows( 3 ),
			Field::make( 'text', 'contacts_company', __( 'Компания', DOMAIN ) ),
			Field::make( 'textarea', 'contacts_address', __( 'Адрес', DOMAIN ) )
				->set_rows( 3 ),
			Field::make( 'text', 'contacts_lat', 'lat' ),
			Field::make( 'text', 'contacts_lng', 'lng' ),
			Field::make( 'complex', 'contacts_tels', __( 'Телефоны', DOMAIN ) )
				->setup_labels( $complex_labels )
				->set_collapsed( true )
				->set_layout( 'tabbed-vertical' )
				->add_fields( array(
					Field::make( 'text', 'tel', __( 'Номер телефона', DOMAIN ) ),
				) )
				->set_header_template( '<%- tel %>' ),
			Field::make( 'text', 'contacts_regime', __( 'Режим', DOMAIN ) ),
		) )
	;
	
}


?>