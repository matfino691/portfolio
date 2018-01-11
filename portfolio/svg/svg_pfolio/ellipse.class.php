<?php

// l'ellipse descend l'objet mère shape
class Ellipse extends Shape
{
	private $_RadiusX;
	private $_RadiusY;

	// constructeur de l'ellipse
	public function __construct($couleur, $localisationX, $localisationY, $opacity, $Xradius, $Yradius)
	{
		parent::__construct($couleur, $localisationX, $localisationY, $opacity);
		$this->setRadius($Xradius, $Yradius);
	}

	// setter
	public function setRadius($Xradius, $Yradius)
	{
		if (is_numeric($Xradius) && is_numeric($Xradius)) 
		{
			$this->_RadiusX = $Xradius;
			$this->_RadiusY = $Yradius;
		}
	}

	// getters
	public function getXradius()
	{
		return $this->_RadiusX;
	}
	public function getYradius()
	{
		return $this->_RadiusY;
	}

	// coordonnées de l'ellipse insérées dans le HTML
	public function draw()
	{
		$x = $this->getX();
		$y = $this->getY();
		$radX = $this->getXradius();
		$radY = $this->getYradius();
		$col = $this->getCouleur();
		$opac = $this->getOpacity();

		echo "<ellipse cx='$x' cy='$y' rx='$radX' ry='$radY' fill='$col' opacity='$opac'/>";
	}


}
