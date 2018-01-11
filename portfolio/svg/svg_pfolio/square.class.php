<?php

// le carré herite des particularites du rectangle
class Square extends Rect
{	

	// constructeur du carré, on annule height car le carré possède une longueur identique pour ses 4 cotés
	public function __construct($couleur, $localisationX, $localisationY, $opacity, $width, $height = 0)
	{
		parent::__construct($couleur, $localisationX, $localisationY, $opacity, $width, $height = 0);
	}

	// setter
	public function setSize($width, $height = 0)
	{
		if (is_numeric($width)) 
		{
			$this->_width = $width;
		}
	}
	
	// getter
	public function getWidth()
	{
		return $this->_width;
	}
	
	// coordonnées du carré insérées dans le HTML
	public function draw()
	{
		$x = $this->getX();
		$y = $this->getY();
		$w = $this->getWidth();
		$col = $this->getCouleur();
		$opac = $this->getOpacity();

		echo "<rect x='$x' y='$y' width='$w' height='$w' fill='$col' opacity='$opac'/>";
	}
}



