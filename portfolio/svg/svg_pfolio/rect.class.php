<?php

// le rectangle descend l'objet mère shape
class Rect extends Shape
{
	private $_width;
	private $_height;

	// constructeur du rectangle
	public function __construct($couleur, $localisationX, $localisationY, $opacity, $width, $height)
	{
		parent::__construct($couleur, $localisationX, $localisationY, $opacity);
		$this->setSize($width, $height);
	}

	// setter
	public function setSize($width, $height)
	{
		if (is_numeric($width) && is_numeric($height)) 
		{
			$this->_width = $width;
			$this->_height = $height;
		}
	}
	
	// getters
	public function getWidth()
	{
		return $this->_width;
	}
	public function getHeight()
	{
		return $this->_height;
	}

	// coordonnées du rectangle insérées dans le HTML
	public function draw()
	{
		$x = $this->getX();
		$y = $this->getY();
		$w = $this->getWidth();
		$h = $this->getHeight();
		$col = $this->getCouleur();
		$opac = $this->getOpacity();

		echo "<rect x='$x' y='$y' width='$w' height='$h' fill='$col' opacity='$opac'/>";
	}
}

