<?php

// si le formulaire est envoyé, recupération des paramètres demandés
if ($_POST) 
{
	$family = $_POST['family'];
	$color = $_POST['color'];
	$opacity = $_POST['opacity'];
	$X = $_POST['X'];
	$Y = $_POST['Y'];
	
	// instancier la forme demandé en fonction du select choisi
	switch ($family) {
		case 'rectangle':
			$width = $_POST['width'];
			$height = $_POST['height'];
			$shape = new Rect($color, $X, $Y , $opacity, $width, $height);
			break;
		case 'square':
			$width = $_POST['width'];
			$shape = new Square($color, $X, $Y , $opacity, $width);
			break;
		case 'ellipse':
			$Xradius = $_POST['Xradius'];
			$Yradius = $_POST['Yradius'];			
			$shape = new Ellipse($color, $X, $Y , $opacity, $Xradius, $Yradius);
			break;
		case 'circle':
			$Xradius = $_POST['Xradius'];
			$shape = new Circle($color, $X, $Y , $opacity, $Xradius);
			break;
		case 'triangle':
			$x1 = $_POST['x1'];
			$y1 = $_POST['y1'];
			$x2 = $_POST['x2'];
			$y2 = $_POST['y2'];
			$x3 = $_POST['x3'];
			$y3 = $_POST['y3'];
			$shape = new Triangle($color, $X, $Y, $opacity, $x1, $y1, $x2, $y2, $x3, $y3);
	}
}