/*$.noConflict();*/

jQuery(document).ready(function($) {

	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	$('.selectpicker').selectpicker();

	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
	});

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	// $('.user-area> a').on('click', function(event) {
	// 	event.preventDefault();
	// 	event.stopPropagation();
	// 	$('.user-menu').parent().removeClass('open');
	// 	$('.user-menu').parent().toggleClass('open');
	// });


	/*Custom Planet js*/
	
	$('.header-left .btn').on('click', function(event) {	
		$('body').addClass('show-content');
	});
	$('.add-appointment').on('click', function(event) {	
		$('body').addClass('show-appointment-side');
	});
	$('.body-overlay').on('click', function(event) {	
		$('body').removeClass('show-content');
		$('body').removeClass('show-appointment-side');
	});
	$('.panel-close').on('click', function(event) {	
		$('body').removeClass('show-content');
		$('body').removeClass('show-appointment-side');
	});

});	




  /*Select Checkbox Tags*/
	$('.select-tags').on('click', function(event) {	
		$().toggleClass('active');
	});	



    $(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
