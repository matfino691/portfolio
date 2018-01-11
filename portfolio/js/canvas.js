'use strict';

$(function(){

// animation du remplissages des cercles de compétences

	//encercler les input d'une div round qui contient les jauges circulaires
	$('input.round').wrap('<div class="round" />').each(function(){
		//appliquer la function sur chaque input
		
		// sauvegarde des selecteurs
		var that = $(this);
		var parent = $(this).parent();

		// recupere l'attribut data-min
		var min = $(this).data('min');

		// recupere l'attribut data-max
		var max = $(this).data('max');

		//ratio permettant d'afficher la jauge correspondant a la valeur data
		var ratio = ($(this).val() - min) / (max - min);

		//definition du 1er canvas
		var circle = $('<canvas width="200px" height="200px" />');
		//insertion du canvas dans la div
		parent.append(circle);

		//definition du 2nd canvas qui sera animé au mousemove
		var color = $('<canvas width="200px" height="200px" />');
		//insertion du canvas dans la div
		parent.append(color);

		// création du contexte 2d du premier cercle statique
		var ctx = circle[0].getContext('2d');
		//commencer un tracé
		ctx.beginPath();
		//formule mathématique permettant de tracer un cercle
		ctx.arc(100, 100, 80, 0, 2*Math.PI);

		// config du canvas
		ctx.lineWidth = 20;
		ctx.strokeStyle = "rgba(255,255,255,0.9)";
		ctx.shadowOffsetX = 2;
		ctx.shadowBlur = 10;
		ctx.shadowColor = "rgba(0,0,0, 0.4)";
		ctx.stroke();

		// second cercle dont les valeurs pourront changer avec actions de la souris, et qui va remplir le 1er cercle
		var ctx = color[0].getContext('2d');
		ctx.beginPath();
		// formule permettant de faire debuter le remplissage en haut et au centre, en fonction du ratio
		ctx.arc(100, 100, 80, -1/2*Math.PI, ratio*2*Math.PI - 1/2 * Math.PI);
		ctx.lineWidth = 20;
		ctx.strokeStyle = "#34DAEB";
		ctx.stroke();

		// EVENTS
		
		// detecter l'apui sur la souris
		parent.on('mousedown', function(event){
			
			//bind un second events, le mouvement de la souris
			parent.bind('mousemove', function(event){
			//positions en x et y de la souris par rapport au center de l'element parent
			var x = event.pageX - parent.offset().left - parent.width()/2;
			var y = event.pageY - parent.offset().top - parent.height()/2;
			//convertir ces valeurs en un angle commencant en haut et au centre, allant de 0 a 1 ,via la fonction tangente
			var a  = Math.atan2(x,-y) / (2*Math.PI);
			//empecher l'angle de prendre une valeur négative
			if (a < 0 ) {
				a += 1 ;
			};
			//vider le canva pour le remplir dynamiquement a chaque mouvement
			ctx.clearRect(0, 0, 200, 200);

			// remplissage dynamique du cercle en fonction de l'angle calculé
			ctx.beginPath();
			ctx.arc(100, 100, 80, -1/2*Math.PI, a*2*Math.PI - 1/2 * Math.PI);
			ctx.lineWidth = 20;
			ctx.strokeStyle = "#34DAEB";
			ctx.stroke();
			// affichage dynamique de la valeur de l'input
			that.val(Math.round(a*(max-min) + min));
			})
		});

		//supprimer le mousemove lors du mouseup
		parent.on('mouseup', function(event){
			//eviter d'avoir des event parasite lors des actions
			event.preventDefault();
			parent.unbind('mousemove');
		})
	});

});