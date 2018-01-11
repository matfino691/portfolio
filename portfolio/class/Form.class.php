<?php 


////////////////////////////////////////////////
//           FORMULAIRE DYNAMIQUE             //
////////////////////////////////////////////////

class Form {

	// données du formulaire
	private $datas = [];

	//
	public function __construct($datas = []){

		$this->datas = $datas;
	}

	// formualaire inséré sur la page html en dynamique
	private function input($type, $name, $label){
		
		// informations saisies par l'utilisateur, vide par défaut
		$value = '';
		
		// les données saisie restent affichées en cas d'erreur, evite a l'utilisateur de tout resaisir
		if (isset($this->datas[$name])) 
		{
			$value = $this->datas[$name];
		}
		
		// input du champ textarea spécifique
		if ($type == 'textarea') 
		{	
			$input = "<textarea required type=\"$type\" name=\"$name\" rows=\"10\" cols=\"50\" >$value</textarea>";
		} else {

			// autres input mail et name
			$input = "<input required type=\"$type\" name=\"$name\" value=\"$value\">";
		}

		//affichage du formulaire
		//cliquer sur le label pour remplir l'input, intuitif
		return "<label>$label $input</label>";		
	}

	//affectation des attributs et label de chaque input via ->input()
	public function email($name, $label){
		
		return $this->input('email', $name, $label);		
	}

	public function text($name, $label){
		
		return $this->input('text', $name, $label);		
	}

	public function textarea($name, $label){
		
		return $this->input('textarea', $name, $label);
	}

}