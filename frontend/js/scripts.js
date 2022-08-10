//=include plugins.js

'use strict';

/* modal */

const FIXED_ELEMENTS = '.header';

const Modal = AccessibleMinimodal.init({
	style: {
		use: false
	},
	on: {
		beforeOpen: instance => {
			const btn = $(instance.openingNode);
			const input = $(instance.modal).find('[name="title"]');
			if(btn.data('title')){
				input.val(btn.data('title'));
			}else{
				input.val(input.data('title'));
			}
			const scrollbarWidth = instance.getScrollbarWidth();
			$(FIXED_ELEMENTS).css('margin-right', scrollbarWidth);
		},
		afterClose: () => {
			$(FIXED_ELEMENTS).css('margin-right', 0);
		}
	}
})

$('[href^="#modal-"]').each(function(){
	const t = $(this);
	t.attr('data-modal-open', t.attr('href').substring(1));
})

/* header-nav */

$(document).on('click', '.header-nav-open', function(event){
	$('html').addClass('header-nav-opened header-nav-is-open');
	return false;
})

$(document).on('click', '.header-nav-close', function(){
	closeHeaderNav()
	return false;
})

$(document).on('click', function(event){
	if($(event.target).closest('.header-nav-open, .header-nav-close, .header-nav-body, .modal').length) return;
	closeHeaderNav();
})

function closeHeaderNav(){
	if(!$('html').hasClass('header-nav-is-open')) return;
	$('html').removeClass('header-nav-is-open');
	setTimeout(() => {
		$('html').removeClass('header-nav-opened');
	}, 400);
}

/* header-fixed */

fixedHeader();
$(window).on('scroll resize', fixedHeader);

function fixedHeader(){
	if($(this).scrollTop() > 0){
		$('html').addClass('header-is-fixed');
	}else{
		$('html').removeClass('header-is-fixed');
	}
}

/* waypoints */

initScrollAnim();

function initScrollAnim(){
	$('[data-anim]').each(function(){
		const t = $(this);
		const animClass = t.data('anim') || 'anim';
		const offset = t.data('anim-offset') || '95%';
		const timeout = t.data('anim-timeout') || 0;
		t.waypoint({
			handler: function(direction){
				if(direction == 'up') return
				if(t.hasClass(animClass)) return;
				setTimeout(() => t.addClass(animClass), 200 + timeout);
				setTimeout(() => t.addClass('anim-is-end'), 1000 + timeout);
			},
			offset: offset
		})
	})
}

/* glightbox */

const lightbox = GLightbox({
	openEffect: 'fade',
	closeEffect: 'fade',
	videosWidth: 1440,
});

lightbox.on('open', () => $(FIXED_ELEMENTS).addClass('gscrollbar-fixer'));

lightbox.on('close', () => $(FIXED_ELEMENTS).removeClass('gscrollbar-fixer'));

/* form */

$(document).on('submit', '.form', function(event){
	event.preventDefault();
	const t = $(this);
	t.find('.submit').attr('disabled', true);
	const formData = new FormData();
	formData.append('action', 'bitmain_form_action');
	t.find('[name]:not([type="file"], [type="checkbox"], [type="radio"])').each(function(){
		formData.append($(this).attr('name'), $(this).val());
	})
	t.find('[name][type="checkbox"], [name][type="radio"]').each(function(index){
		if($(this).prop('checked')){
			formData.append($(this).attr('name'), $(this).val())
		}
	})
	const files = t.find('.file-input').length ? t.find('.file-input')[0].files : false;
	if(files){
		[].slice.call(files).forEach(function(item, index){
			formData.append('file-' + index, files[index], item.name);
		})
	}
	// for (var pair of formData.entries()) {
		 // console.log(pair[0]+ ', ' + pair[1]); 
	// }
	$.ajax({
		url: SITE_URL + '/wp-admin/admin-ajax.php',
		type: 'POST',
		data: formData,
		processData: false,
		contentType: false,
		success: function(answer){
			// console.log(answer);
			t.find('.submit').removeAttr('disabled');
			if(answer === 'sent'){
				Modal.openModal('modal-sent');
				clearFields();
			}else{
				alert(t.data('alert'));
			}
			function clearFields(){
				t.find('.input').val('');
				t.find('.form-block').removeClass('valid not-valid focus value');
				t.find('.file-input').val('');
				t.find('.file-label-title').text(t.find('.file-label-title').data('title') || '');
				t.find('[name][type="checkbox"], [name][type="radio"]').prop('checked', false).closest('label').removeClass('active');
			}
		}
	})
});

/* scroll-to-btn */

$('.header-menu [href^="#"]').on('click', function(){
	closeHeaderNav();
	scrollToBlock($(this).attr('href'));
	return false;
})

$('.promo-btn').on('click', function(){
	scrollToBlock($(this).closest('.promo').next());
	return false;
})

function scrollToBlock(to, speed, offset){
	if(typeof to === 'string') to = $(to);
	if(!to[0]) return;
	if(!offset){
		offset = 68;
	}
	speed = speed || 1000;
	$('html').stop().animate({
		scrollTop: to.offset().top - offset
	}, speed);
}

/* accordion */

$(document).on('click', '.accordion-item-toggle', function(){
	const t = $(this);
	const accordion = t.closest('.accordion');
	if(t.hasClass('active')){
		close();
	}else{
		close();
		t.addClass('active');
		t.closest('.accordion-item').find('.accordion-item-body').slideDown(400);
	}
	function close(){
		accordion.find('.accordion-item-toggle').removeClass('active');
		accordion.find('.accordion-item-body').slideUp(400);
	}
	return false;
})

/* contacts-map */

if($('.contacts-map').length && location.hostname !== 'localhost'){
	setTimeout(() => {
		$.getScript( 'https://api-maps.yandex.ru/2.1/?lang=' + $('html').attr('lang'), function( data, textStatus, jqxhr ) {
			if(textStatus === 'success' && jqxhr.status === 200){
				ymaps.ready(initMap)
			}
		});
	}, 4000);
}

function initMap() {
	$('.contacts-map').each(function(){
		const markers = JSON.parse($(this).find('script').text());
		const center = [Number(markers[0].lat), Number(markers[0].lng)];
		const myMap = new ymaps.Map(this, {
			center: center,
			zoom: 16,
			controls: ['zoomControl']
		}, {
			searchControlProvider: 'yandex#search'
		});
		markers.forEach(marker => {
			const myPlacemark = new ymaps.Placemark(
				myMap.getCenter(),
			{
				balloonContent: marker.address,
				iconCaption: marker.marker
			},{
				preset: 'islands#redDotIconWithCaption'
			});
			myMap.geoObjects.add(myPlacemark);
		})
	})
}

/* parallax */

if(window.matchMedia('(min-width:768px)').matches){
	skrollr.init({
		forceHeight: false,
		mobileCheck: () => false
	});
}