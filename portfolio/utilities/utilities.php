<?php 
	
/////////////////////////////////////////////////////////
//           FONCTIONS UTILITAIRES                     //
/////////////////////////////////////////////////////////

	
	function startSession(){

		if(session_status() == PHP_SESSION_NONE)
			{
	      // Démarrage du module PHP de gestion des sessions.
				session_start();
			}
	}

	function destroySession(){

		// destruction de la session
		$_SESSION = [];
        session_destroy();
	}