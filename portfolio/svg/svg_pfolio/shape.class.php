<?php

// classe mère pouvant avoir plusieurs formes comme enfants
abstract class Shape
{
	private $_couleur;
	private $_localisationX;
	private $_localisationY;
	private $_opacity;

	// constructeur de forme
	public function __construct($couleur, $localisationX, $localisationY, $opacity)
	{
		$this->setCouleur($couleur); // Initialisation de la couleur.
        $this->setLocalisation($localisationX, $localisationY); // Initialisation de la localisation.
        $this->setOpacity($opacity); // Initialisation de l'opacité.
	}

	// setters
	public function setCouleur($couleur)
	{	
		if (preg_match("-^#-", $couleur)) 
		{
			$this->_couleur = $couleur;
		} else
		{
			$this->_couleur = 'black';
		}
	}

	public function setLocalisation($localisationX, $localisationY)
	{
		if (($localisationX >=0 && $localisationX <= 900) && ($localisationY >=0 && $localisationY <= 500)) 
		{	
			$this->_localisationX = $localisationX;
			$this->_localisationY = $localisationY;
		} 
	}

	public function setOpacity($opacity)
	{
		if ($opacity >= 0 && $opacity <=1) 
		{
			$this->_opacity = $opacity;
		} else
		{
			$this->_opacity = 1;
		}
	}

	// getters
	public function getCouleur()
	{
		return $this->_couleur;
	}

	public function getX()
	{
		return $this->_localisationX;
	}

	public function getY()
	{
		return $this->_localisationY;
	}

	public function getOpacity()
	{
		return $this->_opacity;
	}


	abstract function draw();

}