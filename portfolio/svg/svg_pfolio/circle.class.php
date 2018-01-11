<?php

// le carré herite des particularites de l'ellipse
class Circle extends Ellipse
{
	// constructeur du carré, on annule le radius en Y car le carré possède un radius unique
	public function __construct($couleur, $localisationX, $localisationY, $opacity, $Xradius, $Yradius = 0)
	{
		parent::__construct($couleur, $localisationX, $localisationY, $opacity, $Xradius, $Yradius = 0);
	}

	// setter
	public function setRadius($Xradius, $Yradius = 0)
	{
		if (is_numeric($Xradius)) 
		{
			$this->_RadiusX = $Xradius;
		}
	}
	
	// getter
	public function getXradius()
	{
		return $this->_RadiusX;
	}

	// coordonnées du cerlce insérées dans le HTML
	public function draw()
	{
		$x = $this->getX();
		$y = $this->getY();
		$radX = $this->getXradius();
		$col = $this->getCouleur();
		$opac = $this->getOpacity();

		echo "<circle cx='$x' cy='$y' r='$radX' fill='$col' opacity='$opac'/>";
	}
}


