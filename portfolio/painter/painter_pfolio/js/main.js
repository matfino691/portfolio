'use strict'; 

/*************************************************************************************************/
/* ***************************************** OBJETS ***************************************** */
/*************************************************************************************************/

// creation du canvas pour l'ardoise
var Ardoise = function(){

	this.canvas = document.getElementById("ardoise");
	this.ctx = this.canvas.getContext("2d");
	this.ctx.strokeStyle = '#BADA55';
	this.ctx.lineJoin = 'round';
  	this.ctx.lineCap = 'round';
	this.ctx.lineWidth = 5;
	this.isDrawing = false;
  	this.lastX = 0;
  	this.lastY = 0;

  	this.palette = new Palette();
};

// creation du canvas contenant la palette
var Palette = function(){

	this.canvas = document.getElementById("palette");
	this.ctx2 = this.canvas.getContext("2d");
		
	this.gradient = this.ctx2.createLinearGradient(0,150,150,150);
	this.gradient.addColorStop(0.05,"hsl(2, 100%, 50%)");
	this.gradient.addColorStop(0.15,"hsl(61, 100%, 50%)");
	this.gradient.addColorStop(0.30,"hsl(111, 100%, 50%)");    
	this.gradient.addColorStop(0.45,"hsl(180, 100%, 50%)");
	this.gradient.addColorStop(0.60,"hsl(244, 100%, 50%)");
	this.gradient.addColorStop(0.75,"hsl(301, 100%, 50%)");
	this.gradient.addColorStop(0.95,"hsl(2, 100%, 50%)");

	this.ctx2.fillStyle = this.gradient;            
	this.ctx2.fillRect(0,0,150,150);

	this.gradient = this.ctx2.createLinearGradient(150,0,150,150);
	this.gradient.addColorStop(0,"rgba(255, 255, 255, 1)");     
	this.gradient.addColorStop(0.5,"rgba(255, 255, 255, 0"); 
	this.gradient.addColorStop(1,"rgba(0, 0, 0, 1");    

	this.ctx2.fillStyle = this.gradient;            
	this.ctx2.fillRect(0,0,150,150);

	this.color = 'black';


	$(this.canvas).on('click', this.colorPalette.bind(this));
}

/*************************************************************************************************/
/* ***************************************** FONCTIONS ***************************************** */
/************************************************************************************************/

// au mousedown l'utilisateur pourra commencer a dessiner
Ardoise.prototype.startDraw = function(e)
{
	
	this.isDrawing = true;
	this.lastX = e.offsetX;
	this.lastY = e.offsetY;	
}

// au mousemove l'utilisateur pourra tracer des lignes
Ardoise.prototype.draw = function(e)
{
	// arrete la fn si mouseup
	if (!this.isDrawing) return; 
		
	this.ctx.beginPath();
	this.ctx.moveTo(this.lastX, this.lastY);	  
	this.ctx.lineTo(e.offsetX, e.offsetY);
	this.ctx.stroke();	  
	this.lastX = e.offsetX;
	this.lastY = e.offsetY;
}

// au mouseup il ne sera pas possible de continuer a tracer
Ardoise.prototype.stopDraw = function(){
	
	this.isDrawing = false;
}

// choix couleur rapide
Ardoise.prototype.rapidColor = function(){

	var that = this;
	$('.rapidColor').on('click', function(){
  		var couleur = $(this).data('couleur');
		that.ctx.strokeStyle = couleur;
  	});	

  	
}

// choix epaisseur
Ardoise.prototype.newWidth = function(){
	
	var that = this;
	$('.epaisseur').on('click', function(){
		var width = $(this).data('width');
		that.ctx.lineWidth = width;
	});
}

// effacer
Ardoise.prototype.erase = function(){

	var that = this;
	$('.effacer').on('click', function(){
  		that.ctx.fillStyle="white";
		that.ctx.fillRect(0,0,700,500);
		that.ctx.clearRect(0,0,700,500);
  	});
}

// toggle palette
Ardoise.prototype.togglePalette = function(){
	
  	$('#gradientChoice').on('click', function(){
  		$('#palette').toggle('0.2');
  	});
}

// appliquer la couleur choisi sur la palette pour dessiner sur l'ardoise
Ardoise.prototype.getColor = function() {
	var color = this.palette.color;

	this.ctx.strokeStyle = color;
}

// choix de la couleur sur la palette
Palette.prototype.colorPalette = function(e){
		var x = e.offsetX;
		var y = e.offsetY;

		var couleur = this.ctx2.getImageData(x,y,1,1);
		
		var R = couleur.data[0];
		var G = couleur.data[1];
		var B = couleur.data[2];

		this.color = 'rgb('+ R + ',' + G + ',' + B + ')';
		
		$.event.trigger('canvas:pickColor')
}
/*************************************************************************************************/
/* ************************************** EVENTS *************************************** */
/*************************************************************************************************/

// ecoute d'evenements
Ardoise.prototype.listenDraw = function() {

	this.canvas.addEventListener('mousedown', this.startDraw.bind(this));
	this.canvas.addEventListener('mousemove', this.draw.bind(this));
	this.canvas.addEventListener('mouseup', this.stopDraw.bind(this));
	this.canvas.addEventListener('mouseout', this.stopDraw.bind(this));
	$(document).on('canvas:pickColor', this.getColor.bind(this));
}

/*************************************************************************************************/
/* ************************************** CODE PRINCIPAL *************************************** */
/*************************************************************************************************/


// instanciation de l'objet ardoise
var paint = new Ardoise ();

// appel des methodes de l'objet paint
paint.listenDraw();

paint.rapidColor();

paint.newWidth();

paint.erase();

paint.togglePalette();

// instanciation de l'objet palette
var palette = new Palette();
