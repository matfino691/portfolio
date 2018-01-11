'use strict';

$(function(){

	// ****************FONCTIONS*****************
	
	//maintenir le footer en bas la page quel que soit la taille du contenu de la page
	function onResize(){
		//hauteur de la fenetre
		var wHeight = $(window).height();
		//hauteur du dcoument
		var dHeight = $(document).height();

		if (dHeight > wHeight) {

			$('footer').css({
				'position' : 'static'
			});

		} else {

			$('footer').css({
				'top': 'initial',
				'bottom': 0,
				'margin-top' : 'none',
				'transition': '0s'
			});
		};
	};
	// appel a la fonction resize
	onResize();


	// **************ANIMATIONS********************
	
	//lors du resize le footer s'ajustera comme indiqué dans la fonction onResize()
	$(window).on('resize', function(){
		onResize();
	});

	// animations du sidebar
	$('.openBtn').on('click', function(){
		$('.sidebar').slideDown();
		$('.openBtn').hide();

	});
	$('.closeBtn').on('click', function(){
		$('.sidebar').slideUp();
		$('.openBtn').show();
	});


	// animations texte automatique pour la page index via typed.js
	if ($('#title').length) {
		var options = {
		  	strings:[
		  		'Web Developer"', 
		  		'Eclectic Musician"',
		  		'Modern Art Lover"',
		  		'Occasional Runner"'
		  	],
		  	typeSpeed: 25, 
		  	backSpeed: 15, 
		  	loop: true,
		  	loopCount: Infinity,
		   	showCursor: false
		};
		// affiche le texte automatique dans la classe prevue a cet effet
		var typed = new Typed(".type", options);
	}


	// lien actif du nav
 	var page = location.pathname.split('/').pop();
    $('nav li a[href="' + page + '"]').addClass('active');


    // animation deroulante des liens
	$('#sound strong').on('click', function(){
		$('iframe').toggle('2500');
	});

	$('#skills strong').on('click', function(){
		$('.skills').fadeToggle('2500');
	});


	// animation des screenshot
	// le bloc texte apparait quand la souris entre sur l'image
	$('.bloc_image').on('mouseenter',function(){
		$(this).find('.bloc_text').stop().animate({
			'height':'100%',
			'padding-top': '20%'
		});
	});

	// le bloc texte disparait quand la souris sort de l'image
	$('.bloc_image').on('mouseleave',function(){
		$(this).find('.bloc_text').stop().animate({
			'height':'0',
			'padding-top': '0'

		});
	});

});

