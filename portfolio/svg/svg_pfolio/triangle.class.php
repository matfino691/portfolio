<?php

// le rectangle descend l'objet mère shape
class Triangle extends Shape
{

	private $_x1;
 	private $_y1;
 	private $_x2;
 	private $_y2;
 	private $_x3;
	private $_y3;

	// constructeur du triangle
	public function __construct($couleur, $localisationX, $localisationY, $opacity, $x1, $y1, $x2, $y2, $x3, $y3)
	{
		parent::__construct($couleur, $localisationX, $localisationY, $opacity, $x1, $y1, $x2, $y2, $x3, $y3);
		$this->setPoints($x1, $y1, $x2, $y2, $x3, $y3);
	}

	// setter
	public function setPoints($x1, $y1, $x2, $y2, $x3, $y3)
	{
		if (is_numeric($x1) && is_numeric($y1) && is_numeric($x2) && is_numeric($y2) && is_numeric($x3) && is_numeric($y3)) 
		{
			$this->_x1 = $x1;
	 		$this->_y1 = $y1;
	 		$this->_x2 = $x2;
	 		$this->_y2 = $y2;
	 		$this->_x3 = $x3;
			$this->_y3 = $y3;
		}
	}

	// getters
	public function getX1()
	{
		return $this->_x1;
	}
	public function getY1()
	{
		return $this->_y1;
	}
	public function getX2()
	{
		return $this->_x2;
	}
	public function getY2()
	{
		return $this->_y2;
	}
	public function getX3()
	{
		return $this->_x3;
	}
	public function getY3()
	{
		return $this->_y3;
	}

	// coordonnées du triangle insérées dans le HTML
	public function draw()
	{

		$x1 = $this->getX1();
		$y1 = $this->getY1();
		$x2 = $this->getX2();
		$y2 = $this->getY2();
		$x3 = $this->getX3();
		$y3 = $this->getY3();
		$col = $this->getCouleur();
		$opac = $this->getOpacity();

		echo "<polygon points='$x1 $y1, $x2 $y2, $x3 $y3' fill='$col' opacity='$opac'/>";
	}
}